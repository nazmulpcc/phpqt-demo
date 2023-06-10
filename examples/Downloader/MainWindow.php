<?php

namespace App\Downloader;

class MainWindow extends \Phpqt\PhpqtDemo\Window
{
    public function __construct()
    {
        parent::__construct();
        $this->setWindowTitle('Downloader Demo');
        $this->setPage(new Pages\HomePage($this));
    }
}