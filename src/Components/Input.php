<?php

namespace Phpqt\PhpqtDemo\Components;

use Qt\Widgets\LineEdit;
use Qt\Widgets\Widget;

class Input extends Component
{
    protected mixed $inputMode;

    public function mode($inputMode = LineEdit::Normal): static
    {
        $this->inputMode = $inputMode;
        return $this;
    }
    function build(): LineEdit
    {
        $this->radius = $this->radius ?? '4px';
        $input = new LineEdit();
        $input->setPlaceholderText($this->text ?? '');
        $input->setObjectName($this->objectName);
        $input->setEchoMode($this->inputMode ?? LineEdit::Normal);
        $input->setStyleSheet("
            QLineEdit#{$this->objectName} {
                border: 1px solid #ccc;
                border-radius: {$this->radius};
                padding: 8px;
            }
        ");

        return $input;
    }
}