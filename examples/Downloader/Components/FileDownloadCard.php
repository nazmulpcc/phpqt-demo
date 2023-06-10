<?php

namespace App\Downloader\Components;

use App\Downloader\DownloadManager;
use Qt\Core\Obj;
use Qt\Core\Thread;
use Qt\Widgets\BoxLayout;
use Qt\Widgets\Label;
use Qt\Widgets\Layout;
use Qt\Widgets\ProgressBar;
use Qt\Widgets\Widget;

class FileDownloadCard extends Widget
{
    protected int $timerFd;

    protected ProgressBar $bar;

    protected Widget $card;

    protected Thread $thread;
    public int $percent;

    public function __construct(protected string $url, protected string $filename, Layout $layout)
    {
        parent::__construct();

        $this->card = new Widget();
        $this->card->setObjectName($name = uniqid('downloadCard'));
        $this->card->setStyleSheet("
            #{$name} {
                border: 1px solid #eee;
                border-radius: 5px;
                padding: 20px;
            }
        ");
        $cardLayout = new BoxLayout(2, $this->card);
        $fileLabel = new Label($this->filename);
        $this->bar = new ProgressBar;
        $cardLayout->addWidget($fileLabel);
        $cardLayout->addWidget($this->bar);
        $this->card->setLayout($cardLayout);
        $layout->addWidget($this->card);
    }

    public function start(): void
    {
        $this->thread = new Thread();
        $manager = new DownloadManager($this->url, $this->filename);

        $this->thread->onStarted(function () use ($manager) {
            $this->percent = 0;
            $manager->download(function ($downloaded, $total) {
                $this->percent = (int) (($downloaded / $total) * 100);
            });
            $this->stop();
        });
        $this->thread->onFinished(function () {
            $this->bar->setValue(100);
        });
        $this->thread->start();

        // We use a timer to update the progress bar, because we can't update the UI from a thread
        $this->timerFd = $this->startTimer(1000, function (){
            $this->bar->setValue($this->percent);
            if ($this->percent >= 100) {
                $this->killTimer($this->timerFd);
            }
        });
    }

    public function stop(): void
    {
        $this->thread->exit(0);
    }
}