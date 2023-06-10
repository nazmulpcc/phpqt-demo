<?php

namespace App\Downloader\Pages;

use App\Downloader\Components\FileDownloadCard;
use App\Downloader\MainWindow;
use Phpqt\PhpqtDemo\Components\Button;
use Phpqt\PhpqtDemo\Components\Input;
use Phpqt\PhpqtDemo\Contracts\Page;
use Qt\Widgets\LineEdit;
use Qt\Widgets\Widget;

class HomePage extends Widget implements Page
{
    protected LineEdit $urlInput;
    protected \Qt\Widgets\VBoxLayout $layout;

    public function __construct(protected MainWindow $window)
    {
        parent::__construct();
        $window->setMaximumWidth(500);
        $window->setWindowTitle('Downloading Demo');
        $window->setGeometry(100, 100, 500, 500);
    }

    public function render(): void
    {
        $this->setObjectName('homePage');
        $this->layout = new \Qt\Widgets\VBoxLayout();

        $this->layout->addWidget($this->setUpDownloadForm());
        $this->layout->addStretch();

        $this->setLayout($this->layout);
    }

    public function addFileToDownload(): void
    {
        $url = $this->urlInput->text();

        $download = new FileDownloadCard($url, basename($url), $this->layout);
        $download->start();
    }

    protected function setUpDownloadForm(): Widget
    {
        $formWidget = new \Qt\Widgets\Widget();
        $formLayout = new \Qt\Widgets\BoxLayout(0, $formWidget);
        $this->urlInput = Input::create('url')
            ->text('https://demo.com/file.zip')
            ->build();
        $downloadButton = Button::create('downloadButton')
            ->text('Download')
            ->variant('primary')->build();
        $formLayout->addWidget($this->urlInput);
        $formLayout->addWidget($downloadButton);
        $formWidget->setLayout($formLayout);

        $downloadButton->onClicked(fn() => $this->addFileToDownload());

        return $formWidget;
    }
}