<?php

namespace Phpqt\PhpqtDemo\Components;

use Qt\Widgets\PushButton;
use Qt\Widgets\Widget;

class Button extends Component
{
    const PRIMARY = 'primary';

    const SECONDARY = 'secondary';

    const SUCCESS = 'success';

    const DANGER = 'danger';

    const WARNING = 'warning';

    const INFO = 'info';

    const LIGHT = 'light';

    const DARK = 'dark';

    public function variant(string $variant): static
    {
        $colors = [
            self::PRIMARY => '#017BFE',
            self::SECONDARY => '#6C757D',
            'success' => '#28A745',
            'danger' => '#DC3545',
            'warning' => '#FFC107',
            'info' => '#17A2B8',
            'light' => '#F8F9FA',
            'dark' => '#343A40'
        ];
        return $this->background($colors[$variant] ?? $colors[self::PRIMARY]);
    }

    function build(): PushButton
    {
        $button = new PushButton($this->text ?? 'Button');
        $button->setObjectName($this->objectName);
        $this->radius = $this->radius ?? '4px';
        $button->setStyleSheet("
            QPushButton#{$this->objectName} {
                border: 1px solid #ccc;
                border-radius: {$this->radius};
                padding: 8px;
                background-color: {$this->backgroundColor};
            }
        ");
        $button->setCursor(13);

        return $button;
    }
}