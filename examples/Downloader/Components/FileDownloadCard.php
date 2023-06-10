<?php

namespace App\Downloader\Components;

use Qt\Core\Obj;
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

    public function __construct(protected string $url, protected string $filename, protected Layout $layout)
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
        $cardLayout->addWidget(new Label($this->filename));
        $cardLayout->addWidget($this->bar = new ProgressBar);
        $this->card->setLayout($cardLayout);
        $this->layout->addWidget($this->card);
    }

    public function start(): void
    {
        $this->timerFd = $this->startTimer(1000, function () {
            $value = $this->bar->value() + rand(1, 30);
            if ($value >= 100){
                $this->stop();
                $this->bar->setValue(100);
                $this->layout->removeWidget($this->card);
                $this->card->setHidden(true);
                unset($this->card);
            }else{
                $this->bar->setValue($value);
            }
        });
    }

    public function stop(): void
    {
        $this->killTimer($this->timerFd);
    }
}