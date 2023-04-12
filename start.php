<?php

use Phpqt\PhpqtDemo\Window;
use Qt\Widgets\Application;

require __DIR__ . '/vendor/autoload.php';

$application = new Application($argc, $argv);
$window = new Window();

$window->show();
$application->exec();
