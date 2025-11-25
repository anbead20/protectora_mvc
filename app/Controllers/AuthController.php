<?php

namespace App\Controllers;

use App\Services\AuthService;
use App\Models\UsuarioModel;

class AuthController extends BaseController
{
    public function showRegisterFormAction()
    {
        $this->renderHTML(__DIR__ . '/../../view/auth/register_view.php');
    }

    public function procesarRegisterFormAction()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: " . DIRBASEURL . "/auth/register?error=invalid_method");
            exit;
        }

        $model = new UsuarioModel();
        $authService = new AuthService($model);

        try {
            $authService->register([
                'username' => $_POST['username'] ?? '',
                'email'    => $_POST['email'] ?? '',
                'telefono' => $_POST['telefono'] ?? '',
                'password' => $_POST['password'] ?? '',
                'nombre'   => $_POST['nombre'] ?? '',
                'apellido' => $_POST['apellido'] ?? '',
                'direccion' => $_POST['direccion'] ?? '',
                'rol'      => $_POST['rol'] ?? 'empleado'
            ]);

            header("Location: " . DIRBASEURL . "/auth/login?success=registered");
            exit;
        } catch (\Exception $e) {
            header("Location: " . DIRBASEURL . "/auth/register?error=" . urlencode($e->getMessage()));
            exit;
        }
    }
}
