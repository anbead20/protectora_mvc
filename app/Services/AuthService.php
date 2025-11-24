<?php

namespace App\Services;

class AuthService
{
    public function register(array $data): bool
    {
        if (empty($data['username']) || empty($data['password']) || empty($data['email'])) {
            return false;
        }

        $_SESSION['usuarios'][] = [
            'username' => $data['username'],
            'email'    => $data['email'],
            'password' => $data['password'],
        ];

        return true;
    }

    public function login(string $username, string $password): bool
    {
        if (!isset($_SESSION['usuarios'])) {
            return false;
        }

        foreach ($_SESSION['usuarios'] as $usuario) {
            if ($usuario['username'] === $username && $usuario['password'] === $password) {
                $_SESSION['auth'] = [
                    'username' => $usuario['username'],
                    'email'    => $usuario['email'],
                    'logged'   => true
                ];
                return true;
            }
        }

        return false;
    }

    public function logout(): void
    {
        unset($_SESSION['auth']);
        session_destroy();
    }

    public function isAuthenticated(): bool
    {
        return isset($_SESSION['auth']) && $_SESSION['auth']['logged'] === true;
    }

    public function getUser(): ?array
    {
        return $_SESSION['auth'] ?? null;
    }
}
