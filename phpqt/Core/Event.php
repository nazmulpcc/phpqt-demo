<?php

namespace Qt\Core;

if (! class_exists(Event::class)){
    class Event
    {
        public function __construct(int $type)
        {
            //
        }

        public function accept()
        {
            //
        }

        public function ignore()
        {
            //
        }

        public function isAccepted(): bool
        {
            return true;
        }

        public function setAccepted(bool $accepted)
        {
            //
        }

        public function type(): int
        {
            //
        }

        public function spontaneous(): bool
        {
            return true;
        }
    }
}