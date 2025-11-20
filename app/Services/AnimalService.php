<?php

namespace App\Services;

use App\Models\AnimalModel;

class AnimalService
{
    private $animalModel;

    public function __construct(AnimalModel $animalModel)
    {
        $this->animalModel = $animalModel;
    }

    // Obtener todos los animales
    public function getAllAnimals()
    {
        $animals = $this->animalModel->get();
        foreach ($animals as &$animal) {
            $fechaNacimiento = new \DateTime($animal['fechaNacimiento']);
            $hoy = new \DateTime();
            $edad = $hoy->diff($fechaNacimiento)->y;
            $animal['edad'] = $edad;
        }
        return $animals;
    }

    // Buscar un animal por ID
    public function getAnimalById(int $id)
    {
        return $this->animalModel->get($id);
    }

    // Crear un nuevo animal
    public function createAnimal(array $data)
    {
        $this->animalModel->setNombre($data['nombre'] ?? null);
        $this->animalModel->setRaza($data['raza'] ?? null);
        $this->animalModel->setFecha($data['fechaNacimiento'] ?? null);

        return $this->animalModel->set();
    }

    // Actualizar un animal
    public function updateAnimal(int $id, array $data)
    {
        $this->animalModel->setId($id);
        $this->animalModel->setNombre($data['nombre'] ?? null);
        $this->animalModel->setRaza($data['raza'] ?? null);
        $this->animalModel->setFecha($data['fechaNacimiento'] ?? null);

        return $this->animalModel->edit();
    }

    // Eliminar un animal
    public function deleteAnimal(int $id)
    {
        return $this->animalModel->delete($id);
    }
}
