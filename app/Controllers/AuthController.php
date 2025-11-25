<?php

namespace App\Controllers;

use App\Services\AuthService;

class AuthController extends BaseController
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showRegisterFormAction()
    {
        $this->renderHTML(__DIR__ . '/../../view/register_view.php');
    }

    public function procesarRegisterFormAction()
    {
        $data = [
            'username' => $_POST['username'] ?? '',
            'email'    => $_POST['email'] ?? '',
            'password' => $_POST['password'] ?? ''
        ];

        if ($this->authService->register($data)) {
            $mensaje = "Usuario registrado correctamente";
        } else {
            $mensaje = "Error: faltan datos o no se pudo registrar";
        }

        $this->renderHTML(__DIR__ . '/../../view/register_view.php', [
            'message' => $mensaje
        ]);
    }
}
