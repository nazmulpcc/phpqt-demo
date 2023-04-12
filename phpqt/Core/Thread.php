<?php

namespace Qt\Core;

if (! class_exists(Thread::class)){
    class Thread extends Obj
    {
        public function exit(int $returnCode = 0)
        {
            //
        }

        public function isFinished(): bool
        {
            return true;
        }

        public function isRunning(): bool
        {
            return true;
        }

        public function isInterruptionRequested(): bool
        {
            return true;
        }

        public function loopLevel(): int
        {
            return 0;
        }

        public function priority(): int
        {
            //
        }

        public function requestInterruption()
        {
            //
        }

        public function setPriority(int $priority)
        {
            //
        }

        public function setStackSize(int $stackSize)
        {
            //
        }

        public function stackSize(): int
        {
            //
        }

        public function start(int $priority = 0)
        {
            //
        }

        public function terminate()
        {
            //
        }

        public function wait(int $time = 0)
        {
            //
        }

        public function onFinished(callable $callback)
        {
            //
        }

        public function onStarted(callable $callback)
        {
            //
        }
    }
}