<?php

namespace Phpqt\PhpqtDemo\Contracts\Repository;

interface UserRepository
{
    public function login(string $email, string $password): false|array;

    public function logout(): bool;

    public function isLoggedIn(): bool;

    public function currentUser(): false|array;

    public function register(array $data): bool;

    public function update(array $data): array;

    public function all(): array;
}