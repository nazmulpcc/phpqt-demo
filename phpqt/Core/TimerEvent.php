<?php

namespace Qt\Core;

if (! class_exists(TimerEvent::class)){
    class TimerEvent extends Event
    {
        public function __construct(int $timerId)
        {
            //
        }

        public function timerId(): int
        {
            //
        }
    }
}