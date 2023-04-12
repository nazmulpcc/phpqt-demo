<?php

namespace Qt\Widgets;

if (! class_exists(LineEdit::class)) {
    class LineEdit extends Widget
    {
        const Normal = 0;

        const NoEcho = 1;

        const Password = 2;

        const PasswordEchoOnEdit = 3;

        public function __construct(string $text = '', Widget $parent = null)
        {
        }

        public function inputMask(): string
        {
            //
        }

        public function isModified(): bool
        {
            //
        }

        public function isReadOnly(): bool
        {
            //
        }

        public function placeholderText(): string
        {
            //
        }

        public function setEchoMode(int $mode)
        {
            //
        }

        public function text(): string
        {
        }

        public function setText(string $text)
        {
        }

        public function setInputMask(string $inputMask)
        {
        }

        public function setMaxLength(bool $modified)
        {
        }

        public function setPlaceholderText(string $placeholder)
        {
        }

        public function setReadOnly(bool $readOnly)
        {
        }

        public function setValidator($validator)
        {
        }

        public function setSelection(int $start, int $finish)
        {
        }
    }
}