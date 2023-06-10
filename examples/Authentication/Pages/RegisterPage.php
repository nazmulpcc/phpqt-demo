<?php

namespace App\Authentication\Pages;

use App\Authentication\MainWindow;
use Phpqt\PhpqtDemo\Contracts\Page;
use Phpqt\PhpqtDemo\Window;
use Qt\Widgets\BoxLayout;
use Qt\Widgets\Layout;
use Qt\Widgets\LineEdit;
use Qt\Widgets\PushButton;
use Qt\Widgets\VBoxLayout;
use Qt\Widgets\Widget;

class RegisterPage extends Widget implements Page
{
    protected LineEdit $fullName;

    protected LineEdit $username;

    protected LineEdit $password;

    protected Layout $layout;
    protected PushButton $submitButton;
    protected PushButton $loginButton;

    public function __construct(protected MainWindow $window)
    {
        parent::__construct();
    }

    public function render(): void
    {
        $this->setObjectName('loginPage');
        $this->setUpFullNameField();
        $this->setUpUsernameField();
        $this->setUpPasswordField();
        $this->setUpSubmitButton();
        $this->setUpLoginButton();
        $this->setUpWrapper();

        $this->loginButton->onClicked(fn() => $this->window->setPage(new LoginPage($this->window)));
        $this->submitButton->onClicked(function () {
            $this->submitButton->setDisabled(true);
            $data = [
                'name' => $this->fullName->text(),
                'email' => $this->username->text(),
                'password' => $this->password->text(),
            ];
            if($this->window->userRepository->register($data)) {
                $this->window->setPage(new LoginPage($this->window));
            }else{
                var_dump("Registration Failed");
                $this->submitButton->setDisabled(false);
            }
        });
    }

    protected function setUpFullNameField(): void
    {
        $fullName = new LineEdit();
        $fullName->setPlaceholderText('John Economus');
        $fullName->setObjectName('fullname');
        $fullName->setStyleSheet('
            QLineEdit#fullname {
                border: 1px solid #ccc;
                border-radius: 4px;
                padding: 8px;
            }
        ');
        $this->fullName = $fullName;
    }

    protected function setUpUsernameField(): void
    {
        $username = new LineEdit();
        $username->setPlaceholderText('john@economus.com');
        $username->setObjectName('username');
        $username->setStyleSheet('
            QLineEdit#username {
                border: 1px solid #ccc;
                border-radius: 4px;
                padding: 8px;
            }
        ');
        $this->username = $username;
    }

    protected function setUpPasswordField(): void
    {
        $password = new LineEdit();
        $password->setPlaceholderText('Super Secret Password');
        $password->setObjectName('password');
        $password->setEchoMode(LineEdit::Password);
        $password->setStyleSheet('
            QLineEdit#password {
                border: 1px solid #ccc;
                border-radius: 4px;
                padding: 8px;
            }
        ');
        $this->password = $password;
    }

    protected function setUpSubmitButton(): void
    {
        $submitButton = new PushButton('Register');
        $submitButton->setObjectName('submitButton');
        $submitButton->setStyleSheet('
            QPushButton#submitButton {
                border: 1px solid #ccc;
                border-radius: 4px;
                padding: 8px;
                background-color: #017BFE;
            }
        ');
        $submitButton->setCursor(13);
        $this->submitButton = $submitButton;
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
        $this->layout->addStretch();
        $this->layout->addWidget($this->fullName);
        $this->layout->addWidget($this->username);
        $this->layout->addWidget($this->password);
        $this->layout->addWidget($this->submitButton);
        $this->layout->addWidget($this->loginButton);
        $this->layout->addStretch();
        $this->setLayout($this->layout);
    }

    protected function setUpLoginButton()
    {
        $registerButton = new PushButton('Login');
        $registerButton->setObjectName('loginButton');
        $registerButton->setStyleSheet('
            QPushButton#loginButton {
                border: 1px solid #ccc;
                border-radius: 4px;
                padding: 8px;
                background-color: #6C757D;
            }
        ');
        $registerButton->setCursor(13);
        $this->loginButton = $registerButton;
    }
}