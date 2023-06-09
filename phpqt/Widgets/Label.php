<?php

namespace Qt\Widgets;

use Qt\Gui\Pixmap;

if (! class_exists(TextEdit::class)) {
    class Label extends Widget
    {
        public function __construct(string $text = null)
        {
        }

        public function pixmap(): Pixmap
        {
        }

        public function setPixmap(Pixmap $pixmap)
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