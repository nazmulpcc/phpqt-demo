<?php

namespace Phpqt\PhpqtDemo\Helpers;

class Wrapper
{

    public function __construct(protected $target, protected $ignoreExceptions = true)
    {
    }

    public static function create($target, $ignoreExceptions = true): static
    {
        return new static($target, $ignoreExceptions);
    }

    public function __call(string $name, array $arguments)
    {
        try {
            $this->target->{$name}(...$arguments);
        }catch (\Exception $e){
            if (!$this->ignoreExceptions){
                throw $e;
            }
        }
        return $this;
    }
}