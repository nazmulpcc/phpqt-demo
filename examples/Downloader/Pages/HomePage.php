<?php

namespace App\Downloader\Pages;

use App\Downloader\Components\FileDownloadCard;
use App\Downloader\MainWindow;
use Phpqt\PhpqtDemo\Components\Button;
use Phpqt\PhpqtDemo\Components\Input;
use Phpqt\PhpqtDemo\Contracts\Page;
use Qt\Widgets\LineEdit;
use Qt\Widgets\VBoxLayout;
use Qt\Widgets\Widget;

class HomePage extends Widget implements Page
{
    protected LineEdit $urlInput;

    protected LineEdit $filenameInput;

    protected VBoxLayout $layout;

    protected $downloads = [];

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
        $this->layout = new VBoxLayout();

        $form = $this->setUpDownloadForm();
        $this->layout->addWidget($form);
        $this->layout->addStretch();

        $this->setLayout($this->layout);
    }

    public function addFileToDownload(): void
    {
        $url = $this->urlInput->text();
        $filename = $this->filenameInput->text();

        try {
            $this->urlInput->clear();
            $this->filenameInput->clear();
        }catch (\Exception $e){}

        $download = new FileDownloadCard($url, $filename, $this->layout);
        $download->start();
        $this->downloads[] = $download;
    }

    protected function setUpDownloadForm(): Widget
    {
        $formWidget = new \Qt\Widgets\Widget();
        $formLayout = new \Qt\Widgets\BoxLayout(0, $formWidget);
        $this->urlInput = Input::create('url')
            ->text('https://demo.com/file.zip')
            ->build();
        $this->filenameInput = Input::create('filename')
            ->text('file.zip')
            ->build();
        $downloadButton = Button::create('downloadButton')
            ->text('Download')
            ->variant('primary')->build();
        $formLayout->addWidget($this->urlInput);
        $formLayout->addWidget($this->filenameInput);
        $formLayout->addWidget($downloadButton);
        $formWidget->setLayout($formLayout);

        $downloadButton->onClicked(fn() => $this->addFileToDownload());
        $this->urlInput->textChanged(function ($url){
            $fragments = parse_url($url);
            if ($fragments['path'] ?? false) {
                $this->filenameInput->setText(basename($fragments['path']));
            }
        });

        return $formWidget;
    }
}