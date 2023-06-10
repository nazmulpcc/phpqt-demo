<?php

namespace App\Authentication;

use App\Authentication\Pages\LoginPage;
use App\Authentication\Repository\UserArrayRepository;
use App\Authentication\Repository\UserRepository;

class MainWindow extends \Phpqt\PhpqtDemo\Window
{
    public UserRepository $userRepository;

    public function __construct(string $usersFilePath)
    {
        parent::__construct();
        $this->userRepository = new UserArrayRepository($usersFilePath);
        $this->setWindowTitle('Authentication Demo');
        $this->setPage(new LoginPage($this));
    }
}