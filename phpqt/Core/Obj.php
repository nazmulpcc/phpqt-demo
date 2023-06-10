<?php

namespace Qt\Core;

if (! class_exists(Obj::class)) {
    class Obj
    {
        public function __construct(Obj $parent = null)
        {
            //
        }

        public function blockSignals(bool $block)
        {
            //
        }

        public function onObjectNameChanged(callable $callback)
        {
            //
        }

        public function dumpObjectInfo()
        {
            //
        }

        public function dumpObjectTree()
        {
            //
        }

        public function isWidgetType(): bool
        {
            return true;
        }

        public function isWindowType(): bool
        {
            return true;
        }

        public function killTimer(int $fd)
        {
            //
        }

        public function parent(): Obj
        {
            //
        }

        public function objectName(): string
        {
            //
        }

        public function setObjectName(string $name)
        {
            //
        }

        public function setParent(Obj $parent)
        {
            //
        }

        public function startTimer(int $interval, int|callable $timerType = 0, callable $callback = null): int
        {
            //
        }

        public function thread(): Thread
        {
            //
        }

        public function moveToThread(Thread $thread)
        {
            //
        }
    }
}
