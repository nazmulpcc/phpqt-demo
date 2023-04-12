<?php

namespace Qt\Widgets;

if (! class_exists(PushButton::class)) {
    class PushButton extends Widget
    {
        public function __construct(string $text, Widget $parent = null)
        {
        }

        public function onPressed(callable $callback)
        {
            //
        }

        public function onReleased(callable $callback)
        {
            //
        }

        public function onClicked(callable $callback)
        {
            //
        }
    }
}