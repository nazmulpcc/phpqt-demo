<?php

namespace App\Downloader\Pages;

use App\Downloader\MainWindow;
use Phpqt\PhpqtDemo\Components\Button;
use Phpqt\PhpqtDemo\Components\Input;
use Phpqt\PhpqtDemo\Contracts\Page;
use Qt\Widgets\Widget;

class HomePage extends Widget implements Page
{
    public function __construct(protected MainWindow $window)
    {
        parent::__construct();
    }

    public function render(): void
    {
        $this->setObjectName('homePage');
        $layout = new \Qt\Widgets\VBoxLayout();

        $card = new Widget();
        $card->setObjectName('downloadCard');
        $card->setStyleSheet('
            #downloadCard {
                border: 1px solid #eee;
                border-radius: 5px;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
        ');
        $cardLayout = new \Qt\Widgets\BoxLayout(0, $card);
        $cardLayout->addWidget(new \Qt\Widgets\Label('file.zip'));
        $cardLayout->addWidget($bar = new \Qt\Widgets\ProgressBar);
        $card->setLayout($cardLayout);

        $layout->addWidget($this->setUpDownloadForm());
        $layout->addStretch();
        $layout->addWidget($card);

        $id = 0;
        $id = $this->startTimer(1000, function () use ($id, $bar){
            $bar->value() >= 100 ? $this->killTimer($id) : $bar->setValue($bar->value() + rand(1, 10));
        });

        $this->setLayout($layout);
    }

    protected function setUpDownloadForm()
    {
        $formWidget = new \Qt\Widgets\Widget();
        $formLayout = new \Qt\Widgets\BoxLayout(0, $formWidget);
        $urlInput = Input::create('url')
            ->text('https://demo.com/file.zip')
            ->build();
        $downloadButton = Button::create('downloadButton')
            ->text('Download')
            ->variant('primary')->build();
        $formLayout->addWidget($urlInput);
        $formLayout->addWidget($downloadButton);
        $formWidget->setLayout($formLayout);

        return $formWidget;
    }
}