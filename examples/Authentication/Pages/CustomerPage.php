<?php

namespace App\Authentication\Pages;

use App\Authentication\MainWindow;
use Phpqt\PhpqtDemo\Contracts\Page;
use Qt\Widgets\Label;
use Qt\Widgets\Widget;

class CustomerPage extends Widget implements Page
{
    protected int $timerId;

    public function __construct(protected MainWindow $window)
    {
        parent::__construct();
    }

    public function render(): void
    {
        $user = $this->window->userRepository->currentUser();
        $texts = [
            "You are logged in as {$user['name']}",
            "Your email is {$user['email']}",
            "Your password is very secret"
        ];
        $label = new Label($texts[0]);
        $layout = new \Qt\Widgets\VBoxLayout;
        $this->setObjectName('customerPage');
        $this->setLayout($layout);
        $layout->addWidget($label);

        $index = 0;
        $this->timerId = $this->startTimer(1000, function() use ($label, $texts, &$index) {
            $label->setText($texts[$index++ % count($texts)]);
        });
    }

    public function __destruct()
    {
        $this->killTimer($this->timerId);
    }
}