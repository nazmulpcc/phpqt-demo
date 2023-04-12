<?php

namespace Qt\Widgets;

if (! class_exists(TextEdit::class)) {
    class TextEdit extends Widget
    {
        public function __construct(string $text, Widget $parent = null)
        {
        }

        public function toPlainText(): string
        {
        }

        public function copy()
        {
            //
        }
    }
}