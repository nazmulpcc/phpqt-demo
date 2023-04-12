<?php

namespace Qt\Widgets;

if (! class_exists(Layout::class)) {
    class Layout
    {
        public function activate()
        {
            //
        }

        public function addWidget(Widget $widget)
        {
            //
        }

        /**
         * @return array<int, int, int, int>
         */
        public function getContentsMargins(&$left, &$top, &$right, &$bottom): array
        {
            //
        }

        public function isEnabled(): bool
        {
            //
        }

        public function menuBar(): Widget
        {
            //
        }

        public function parentWidget(): Widget
        {
            //
        }

        public function removeItem(LayoutItem $item)
        {
            //
        }

        public function removeWidget(Widget $widget)
        {
            //
        }

        public function setAlignment(Widget $widget, int $alignment)
        {
            //
        }

        public function setContentsMargins(int $left, int $top, int $right, int $bottom)
        {
            //
        }

        public function setEnabled(bool $enable)
        {
            //
        }

        public function setMenuBar(Widget $widget)
        {
            //
        }

        public function setSizeConstraint(int $constraint)
        {
            //
        }

        public function setSpacing(int $spacing)
        {
            //
        }

        public function sizeConstraint()
        {
            //
        }

        public function spacing(): int
        {
            //
        }

        public function update()
        {
            //
        }
    }
}