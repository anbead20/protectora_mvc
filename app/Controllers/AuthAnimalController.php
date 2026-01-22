<?php

namespace App\Controllers;

use App\Services\AuthAnimalService;
use App\Models\AnimalModel;

class AuthAnimalController extends BaseController
{
    public function showRegisterFormAction()
    {
        $this->renderHTML(__DIR__ . '/../../view/auth/register_animal_view.php');
    }

    public function procesarRegisterFormAction()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: " . DIRBASEURL . "/auth/animal/register?error=invalid_method");
            exit;
        }

        $model = new AnimalModel();
        $authService = new AuthAnimalService($model);

        try {
            $authService->register([
                'nombre' => $_POST['nombre'] ?? '',
                'raza'   => $_POST['raza'] ?? '',
                'fechaNacimiento' => $_POST['fechaNacimiento'] ?? null
            ]);

            header("Location: " . DIRBASEURL . "/auth/animal/register?success=registered");
            exit;
        } catch (\Exception $e) {
            header("Location: " . DIRBASEURL . "/auth/animal/register?error=" . urlencode($e->getMessage()));
            exit;
        }
    }
}
