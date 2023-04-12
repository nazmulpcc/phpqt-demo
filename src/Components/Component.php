<?php

namespace Phpqt\PhpqtDemo\Components;

use Qt\Widgets\Widget;

abstract class Component
{
    protected ?string $objectName = null;

    protected string $radius;

    protected string $backgroundColor;
    protected string $text;

    public static function create(string $name): static
    {
        return (new static())
            ->name($name);
    }

    public function variant(string $variant): static
    {
        return $this;
    }

    public function background(string $color): static
    {
        $this->backgroundColor = $color;
        return $this;
    }

    public function name(string $name): static
    {
        $this->objectName = $name;
        return $this;
    }

    public function text(string $text): static
    {
        $this->text = $text;
        return $this;
    }

    public function radius(string $radius): static
    {
        $this->radius = $radius;
        return $this;
    }

    abstract function build(): Widget;
}