<?php

namespace Phpqt\PhpqtDemo\Pages;

use Phpqt\PhpqtDemo\Components\Button;
use Phpqt\PhpqtDemo\Components\Input;
use Phpqt\PhpqtDemo\Helpers\Wrapper;
use Phpqt\PhpqtDemo\Window;
use Qt\Widgets\BoxLayout;
use Qt\Widgets\Layout;
use Qt\Widgets\LineEdit;
use Qt\Widgets\PushButton;
use Qt\Widgets\VBoxLayout;
use Qt\Widgets\Widget;

class LoginPage extends Page
{
    protected LineEdit $username;

    protected LineEdit $password;

    protected Layout $layout;
    protected PushButton $submitButton;
    protected PushButton $registerButton;
    protected Window $window;

    public function handleLogin()
    {
        $this->submitButton->setDisabled(true);
        $user = $this->window->userRepository->login($this->username->text(), $this->password->text());
        if ($user) {
            var_dump($user);
            $this->window->setPage(new CustomerPage);
        }else{
            $this->submitButton->setDisabled(false);
        }
    }

    public function render(Window $window): void
    {
        $this->window = $window;
        $this->setObjectName('loginPage');
        $this->setUpUsernameField();
        $this->setUpPasswordField();
        $this->setUpSubmitButton();
        $this->setUpRegisterButton();
        $this->setUpWrapper();

        $this->registerButton->onClicked(function() {
            $this->window->setPage(new RegisterPage());
        });
        $this->submitButton->onClicked(fn() => $this->handleLogin());
    }

    protected function setUpUsernameField(): void
    {
        $this->username = Input::create('username')
            ->text('john@economus.com')
            ->build();
    }

    protected function setUpPasswordField(): void
    {
        $this->password = Input::create('password')
            ->text('Super Secret Password')
            ->mode(LineEdit::Password)->build();
    }

    protected function setUpSubmitButton(): void
    {
        $this->submitButton = Button::create('submitButton')
            ->text('Login')
            ->variant(Button::PRIMARY)
            ->build();
    }

    protected function setUpWrapper()
    {
        $wrapperWidget = new Widget();
        $wrapperLayout = new BoxLayout(0, $this);
        $wrapperLayout->addWidget($wrapperWidget, 0, 4);
        $this->setUpLayout();
        $wrapperWidget->setLayout($this->layout);
        $wrapperWidget->setMinimumWidth(400);
        $this->setLayout($wrapperLayout);
    }

    protected function setUpLayout(): void
    {
        $this->layout = new VBoxLayout();
        Wrapper::create($this->layout)
            ->addStretch()
            ->addWidget($this->username)
            ->addWidget($this->password)
            ->addWidget($this->submitButton)
            ->addWidget($this->registerButton)
            ->addStretch();
    }

    protected function setUpRegisterButton(): void
    {
        $this->registerButton = Button::create('registerButton')
            ->text('Register')
            ->variant(Button::SECONDARY)
            ->build();
    }
}