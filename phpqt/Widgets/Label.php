<?php

namespace Qt\Widgets;

if (! class_exists(TextEdit::class)) {
    class Label extends Widget
    {
        public function __construct(string $text = null)
        {
        }

        public function setText(string $text)
        {
        }

        public function setAlignment(int $alignment)
        {
        }
    }
}