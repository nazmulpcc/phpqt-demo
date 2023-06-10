<?php

namespace App\Authentication\Repository;

class UserArrayRepository implements UserRepository
{
    protected array $data = [];

    protected ?array $currentUser = null;

    public function __construct(protected string $usersFilePath)
    {
        if (! file_exists($usersFilePath)) {
            file_put_contents($usersFilePath, json_encode([]));
        }
        $this->data = json_decode(file_get_contents($usersFilePath), true) ?: [];
    }

    public function __destruct()
    {
        $this->saveData();
    }

    public function saveData(): void
    {
        file_put_contents($this->usersFilePath, json_encode($this->data));
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
        // validate data
        if (!strlen($data['name']) || !strlen($data['email']) || !strlen($data['password'])) {
            return false;
        }
        $this->data[] = [
            'id' => count($this->data) + 1,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        $this->saveData();
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