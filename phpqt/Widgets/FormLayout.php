<?php

namespace Qt\Widgets;

if (! class_exists(FormLayout::class)) {
    class FormLayout extends Layout
    {
        public function __construct(Layout $parent = null)
        {
        }

        public function addRow(string|Widget $label, Widget $field)
        {
        }
    }
}