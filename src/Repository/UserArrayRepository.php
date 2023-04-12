<?php

namespace Phpqt\PhpqtDemo\Repository;

use Phpqt\PhpqtDemo\Contracts\Repository\UserRepository;

class UserArrayRepository implements UserRepository
{
    protected array $data = [];

    protected ?array $currentUser = null;

    public function __construct()
    {
        if (! file_exists(__DIR__ . '/../../data/users.json')) {
            file_put_contents(__DIR__ . '/../../data/users.json', json_encode([]));
        }
        $this->data = json_decode(file_get_contents(__DIR__ . '/../../data/users.json'), true);
    }

    public function __destruct()
    {
        file_put_contents(__DIR__ . '/../../data/users.json', json_encode($this->data));
    }

    public function login(string $email, string $password): false|array
    {
        foreach ($this->data as $datum) {
            if ($datum['email'] === $email && $datum['password'] === $password) {
                return $this->currentUser = $datum;
            }
        }
        return false;
    }

    public function logout(): bool
    {
        $this->currentUser = null;
        return true;
    }

    public function isLoggedIn(): bool
    {
        return $this->currentUser !== null;
    }

    public function currentUser(): false|array
    {
        return $this->currentUser;
    }

    public function register(array $data): bool
    {
        $this->data[] = [
            'id' => count($this->data) + 1,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        return true;
    }

    public function update(array $data): array
    {
        $this->data[$this->currentUser['id'] - 1] = [
            'id' => $this->currentUser['id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        return $this->currentUser = $this->data[$this->currentUser['id'] - 1];
    }

    public function all(): array
    {
        return $this->data;
    }
}