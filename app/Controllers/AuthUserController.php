<?php

namespace App\Controllers;

use App\Services\AuthUserService;
use App\Models\UsuarioModel;

class AuthUserController extends BaseController
{
    public function showRegisterFormAction()
    {
        $this->renderHTML(__DIR__ . '/../../view/auth/register_user_view.php');
    }

    public function procesarRegisterFormAction()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: " . DIRBASEURL . "/auth/user/register?error=invalid_method");
            exit;
        }

        $model = new UsuarioModel();
        $authService = new AuthUserService($model);

        try {
            // Aquí hasheamos la contraseña antes de pasarla al servicio
            $authService->register([
                'username'     => $_POST['username'] ?? '',
                'email'        => $_POST['email'] ?? '',
                'telefono'     => $_POST['telefono'] ?? '',
                'password'     => password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT),
                'nombre'       => $_POST['nombre'] ?? '',
                'apellido'     => $_POST['apellido'] ?? '',
                'direccion'    => $_POST['direccion'] ?? '',
                'rol'          => $_POST['rol'] ?? 'usuario',
                'ultimo_login' => $_POST['ultimo_login'] ?? null
            ]);

            header("Location: " . DIRBASEURL . "/auth/user/register?success=registered");
            exit;
        } catch (\Exception $e) {
            header("Location: " . DIRBASEURL . "/auth/user/register?error=" . urlencode($e->getMessage()));
            exit;
        }
    }

    public function showLoginFormAction()
    {
        $this->renderHTML(__DIR__ . '/../../view/auth/login.php');
    }

    public function loginAction()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: " . DIRBASEURL . "/auth/user/login?error=invalid_method");
            exit;
        }

        $model = new UsuarioModel();
        $authService = new AuthUserService($model);

        try {
            $user = $authService->login([
                'username' => $_POST['username'] ?? '',
                'password' => $_POST['password'] ?? ''
            ]);

            // Iniciar sesión
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['rol'] = $user['rol'];

            header("Location: " . DIRBASEURL . "/?success=logged_in");
            exit;
        } catch (\Exception $e) {
            header("Location: " . DIRBASEURL . "/auth/user/login?error=" . urlencode($e->getMessage()));
            exit;
        }
    }

    public function showLogoutAction()
    {
        $this->renderHTML(__DIR__ . '/../../view/auth/logout.php');
    }

    public function logoutAction()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: " . DIRBASEURL . "/?error=invalid_method");
            exit;
        }

        // Destruir la sesión del usuario
        session_start();
        session_unset();
        session_destroy();

        header("Location: " . DIRBASEURL . "/?success=logged_out");
        exit;
    }
}
