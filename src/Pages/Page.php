<?php

namespace Phpqt\PhpqtDemo\Pages;

use Phpqt\PhpqtDemo\Window;

abstract class Page extends \Qt\Widgets\Widget
{
    public function canView(?array $user = null): bool
    {
        return true;
    }

    abstract public function render(Window $window): void;
}