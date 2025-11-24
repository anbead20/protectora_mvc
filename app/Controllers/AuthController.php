<?php

namespace App\Controllers;

use App\Services\AuthService;

class AuthController extends BaseController
{
    private $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    /**
     * Ruta: /auth/register
     * Muestra o procesa el formulario de registro
     */
    public function registerAction($params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->renderHTML(__DIR__ . '/../../view/register_view.php');
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'username' => $_POST['username'] ?? '',
                'email'    => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? ''
            ];

            $resultado = $this->authService->register($data);
            $mensaje = $resultado ? "Usuario registrado correctamente" : "Error: faltan datos o no se pudo registrar";

            $this->renderHTML(__DIR__ . '/../../view/register_view.php', [
                'message' => $mensaje
            ]);
        }
    }

    /**
     * Ruta: /auth/login
     * Muestra o procesa el formulario de login
     */
    public function loginAction($params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->renderHTML(__DIR__ . '/../../view/login_view.php');
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($this->authService->login($username, $password)) {
                header("Location: " . DIRBASEURL . "/");
                exit;
            } else {
                $mensaje = "Usuario o contraseña incorrectos";
                $this->renderHTML(__DIR__ . '/../../view/login_view.php', [
                    'message' => $mensaje
                ]);
            }
        }
    }

    /**
     * Ruta: /auth/logout
     * Cierra sesión y redirige al inicio
     */
    public function logoutAction($params)
    {
        $this->authService->logout();
        header("Location: " . DIRBASEURL . "/");
        exit;
    }
}
