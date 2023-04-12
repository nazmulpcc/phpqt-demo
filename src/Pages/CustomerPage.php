<?php

namespace Phpqt\PhpqtDemo\Pages;

use Phpqt\PhpqtDemo\Window;
use Qt\Widgets\Label;

class CustomerPage extends Page
{

    public function render(Window $window): void
    {
        $label = new Label('Customer Page');
        $window->setCentralWidget($label);
    }
}