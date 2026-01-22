<?php

namespace App\Controllers;

use App\Services\AnimalService;
use App\Models\AnimalModel;

class AnimalController extends BaseController
{
    private $animalService;

    public function __construct()
    {
        $model = new AnimalModel();
        $this->animalService = new AnimalService($model);
    }

    public function IndexAction()
    {
        $animals = $this->animalService->getAllAnimals();
        $this->renderHTML(__DIR__ . '/../../view/animales_view.php', [
            'animals' => $animals,
            'title' => 'Lista de Animales'
        ]);
    }

    // Acción para mostrar un animal por ID
    public function ShowAction($request)
    {
        $partes = explode("/", $request);
        $id = end($partes);

        $animal = $this->animalService->getAnimalById((int)$id);

        $this->renderHTML(__DIR__ . '/../../view/animales_view.php', [
            'data' => ['animals' => [$animal]]
        ]);
    }

    // Acción para crear un nuevo animal
    public function CreateAction($request)
    {
        $animal = $this->animalService->createAnimal($request);

        $this->renderHTML(__DIR__ . '/../../view/animales_view.php', [
            'data' => [
                'animals' => [$animal],
                'message' => 'Animal creado correctamente'
            ]
        ]);
    }

    // Acción para actualizar un animal
    public function UpdateAction($request)
    {
        $partes = explode("/", $request['url']);
        $id = end($partes);

        $animal = $this->animalService->updateAnimal((int)$id, $request['data']);

        $this->renderHTML(__DIR__ . '/../../view/animales_view.php', [
            'data' => [
                'animals' => [$animal],
                'message' => 'Animal actualizado correctamente'
            ]
        ]);
    }

    // Acción para eliminar un animal
    public function DeleteAction($request)
    {
        $partes = explode("/", $request);
        $id = end($partes);

        $deleted = $this->animalService->deleteAnimal((int)$id);
        $message = $deleted ? 'Animal eliminado correctamente' : 'Animal no encontrado';

        $this->renderHTML(__DIR__ . '/../../view/animales_view.php', [
            'data' => [
                'animals' => [],
                'message' => $message
            ]
        ]);
    }
}
