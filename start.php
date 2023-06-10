<?php

use Qt\Widgets\Application;
use App\Authentication\MainWindow as AuthenticationMainWindow;

require __DIR__ . '/vendor/autoload.php';

$application = new Application($argc, $argv);

$window = match ($argv[1]) {
    'Authentication' => new AuthenticationMainWindow(__DIR__ . '/data/users.json'),
    'Downloader' => new \App\Downloader\MainWindow(),
    default => die("Unknown demo {$argv[1]}")
};

$window->show();
$application->exec();
