<?php

namespace Phpqt\PhpqtDemo;

use Phpqt\PhpqtDemo\Contracts\Repository\UserRepository;
use Phpqt\PhpqtDemo\Pages\Page;
use Phpqt\PhpqtDemo\Repository\UserArrayRepository;
use Qt\Widgets\Widget;

class Window extends \Qt\Widgets\MainWindow
{
    protected Page $page;

    public UserRepository $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserArrayRepository();
    }

    public function show(): void
    {
        $this->setPage(new Pages\LoginPage());
        parent::show();
    }

    public function setPage(Page $page): static
    {
        if (isset($this->page)) {
            // $this->page->deleteLater();
            unset($this->page);
        }
        $this->page = $page;
        $this->page->render($this);
        $this->setCentralWidget($this->page);
        $this->dumpObjectTree();
        return $this;
    }
}