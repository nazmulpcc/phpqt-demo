<?php

namespace Qt\Widgets;

if (! class_exists(BoxLayout::class)) {
    class BoxLayout extends Layout
    {
        public function __construct(int $direction, Widget $parent = null)
        {
        }

        public function addWidget(Widget &$widget, int $stretch = 0, int $alignment = 0)
        {
        }

        public function addStretch(int $stretch = 0)
        {
        }

        public function addSpacing(int $size)
        {
        }

        public function addLayout(Layout $layout, int $stretch = 0)
        {
        }

        public function addStrut(int $size)
        {
        }

        public function direction(): int
        {
        }

        public function insertWidget(int $index, Widget $widget, int $stretch = 0, int $alignment = 0)
        {
        }

        public function insertStretch(int $index, int $stretch = 0)
        {
        }

        public function insertSpacing(int $index, int $size)
        {
        }

        public function insertLayout(int $index, Layout $layout, int $stretch = 0)
        {
        }

        public function insertStrut(int $index, int $size)
        {
        }

        public function setDirection(int $direction)
        {
        }

        public function setStretch(int $index, int $stretch)
        {
        }

        public function setStretchFactor(Widget $widget, int $stretch)
        {
        }

        public function setSpacing(int $spacing)
        {
        }

        public function spacing(): int
        {
            //
        }

        public function stretch(int $index): int
        {
            //
        }
    }
}