<?php

namespace Qt\Core;

class Size
{
    public function __construct(int $width = 0, int $height = 0)
    {
    }

    public function boundedTo(self $otherSize): self
    {
    }

    public function expandedTo(self $otherSize): self
    {
    }

    public function height(): int
    {
    }

    public function isEmpty(): bool
    {
    }

    public function isNull(): bool
    {
    }

    public function isValid(): bool
    {
    }

    /**
     * Scale the size to the given size. To modify the aspect ratio, use the $mode parameter
     * You can either pass a Size object and $mode or two integers($width & $height) and $mode
     * @param int|Size $width
     * @param int $height
     * @param int $mode
     * @return void
     */
    public function scale(int|self $width, int $height, int $mode = 1): void
    {
    }

    /**
     * Same as "scale" method, but this method returns a new Size object
     * @param int|Size $width
     * @param int $height
     * @param int $mode
     * @return self
     */
    public function scaled(int|self $width, int $height, int $mode = 1): self
    {
    }

    public function setHeight(int $height): void
    {
    }

    public function setWidth(int $width): void
    {
    }

    public function transpose(): void
    {
    }

    public function width(): int
    {
    }

    public function transposed(): self
    {
    }
}