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
            $authService->register([
                'username' => $_POST['username'] ?? '',
                'email'    => $_POST['email'] ?? '',
                'telefono' => $_POST['telefono'] ?? '',
                'password' => $_POST['password'] ?? '',
                'nombre'   => $_POST['nombre'] ?? '',
                'apellido' => $_POST['apellido'] ?? '',
                'direccion' => $_POST['direccion'] ?? '',
                'rol'      => $_POST['rol'] ?? 'usuario',
                'ultimo_login' => $_POST['ultimo_login']
            ]);

            header("Location: " . DIRBASEURL . "/auth/user/register?success=registered");
            exit;
        } catch (\Exception $e) {
            header("Location: " . DIRBASEURL . "/auth/user/register?error=" . urlencode($e->getMessage()));
            exit;
        }
    }
}
