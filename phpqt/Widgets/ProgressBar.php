<?php

namespace Qt\Widgets;

use Qt\Core\Obj;

if (!class_exists(ProgressBar::class)){
    class ProgressBar extends Widget
    {
        public function __construct(Obj $parent = null)
        {
            parent::__construct($parent);
        }

        public function value(): int
        {

        }

        public function setValue(int $value)
        {
        }
    }
}