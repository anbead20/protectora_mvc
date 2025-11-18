<?php

namespace App\Controllers;

use App\Services\AnimalService;

class AnimalController extends BaseController
{
    private $animalService;

    public function __construct(AnimalService $animalService)
    {
        $this->animalService = $animalService;
    }

    // Acción para listar todos los animales
    public function IndexAction()
    {
        $animals = $this->animalService->getAllAnimals();
        $data = ['animals' => $animals];
        $this->renderHTML('../view/animal_index_view.php', $data);
    }

    // Acción para mostrar un animal por ID
    public function ShowAction($request)
    {
        $partes = explode("/", $request);
        $id = end($partes);

        $animal = $this->animalService->getAnimalById((int)$id);
        $data = ['animal' => $animal];
        $this->renderHTML('../view/animal_show_view.php', $data);
    }

    // Acción para crear un nuevo animal
    public function CreateAction($request)
    {
        // Aquí suponemos que $request es un array con los datos
        $animal = $this->animalService->createAnimal($request);
        $data = ['animal' => $animal, 'message' => 'Animal creado correctamente'];
        $this->renderHTML('../view/animal_create_view.php', $data);
    }

    // Acción para actualizar un animal
    public function UpdateAction($request)
    {
        $partes = explode("/", $request['url']);
        $id = end($partes);

        $animal = $this->animalService->updateAnimal((int)$id, $request['data']);
        $data = ['animal' => $animal, 'message' => 'Animal actualizado correctamente'];
        $this->renderHTML('../view/animal_update_view.php', $data);
    }

    // Acción para eliminar un animal
    public function DeleteAction($request)
    {
        $partes = explode("/", $request);
        $id = end($partes);

        $deleted = $this->animalService->deleteAnimal((int)$id);
        $message = $deleted ? 'Animal eliminado correctamente' : 'Animal no encontrado';
        $data = ['message' => $message];
        $this->renderHTML('../view/animal_delete_view.php', $data);
    }
}
