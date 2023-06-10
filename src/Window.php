<?php

namespace Phpqt\PhpqtDemo;

use Phpqt\PhpqtDemo\Contracts\Page;
use Qt\Widgets\Widget;

class Window extends \Qt\Widgets\MainWindow
{
    protected Page $page;

    public function setPage(Page $page): static
    {
        if (isset($this->page)) {
            // $this->page->deleteLater();
            unset($this->page);
        }
        $this->page = $page;
        $this->page->render($this);
        $this->setCentralWidget($this->page);
        return $this;
    }
}