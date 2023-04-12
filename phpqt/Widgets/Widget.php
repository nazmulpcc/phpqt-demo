<?php

namespace Qt\Widgets;

use Qt\Core\Obj;

if (!class_exists(Widget::class)){
    class Widget extends Obj
    {
        public function close()
        {
            //
        }

        public function isEnabled(): bool
        {
            return true;
        }

        /**
         * Sets the cursor for the widget
         * See https://doc.qt.io/qt-5/qt.html#CursorShape-enum for possible values
         * @param int $cursor
         * @return void
         */
        public function setCursor(int $cursor)
        {
            //
        }

        public function setDisabled(bool $disable)
        {
            //
        }

        public function setFocus()
        {
            //
        }

        public function setGeometry(int $x, int $y, int $w, int $h)
        {
            //
        }

        public function setHidden(bool $hidden)
        {
            //
        }

        public function setLayout(Layout $layout)
        {
            //
        }

        public function setMaximumHeight(int $height)
        {
            //
        }

        public function setMaximumSize(int $w, int $h)
        {
            //
        }

        public function setMaximumWidth(int $width)
        {
            //
        }

        public function setMinimumHeight(int $height)
        {
            //
        }

        public function setMinimumSize(int $w, int $h)
        {
            //
        }

        public function setMinimumWidth(int $width)
        {
            //
        }

        public function setStyleSheet(string $styleSheet)
        {
            //
        }

        public function setWindowTitle(string $title)
        {
            //
        }

        public function show()
        {
            //
        }

        public function showMaximized()
        {
            //
        }

        public function showMinimized()
        {
            //
        }

        public function showNormal()
        {
            //
        }

        public function showFullScreen()
        {
            //
        }
    }
}