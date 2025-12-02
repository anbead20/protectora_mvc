<?php

namespace App\Services;

use App\Models\AnimalModel;

class AuthAnimalService
{
    public $animalModel;

    public function __construct(AnimalModel $animalModel)
    {
        $this->animalModel = $animalModel;
    }

    public function register(array $data)
    {
        $this->animalModel->setNombre($data['nombre'] ?? '');
        $this->animalModel->setRaza($data['raza'] ?? '');
        $this->animalModel->setFecha($data['fechaNacimiento'] ?? '');

        return $this->animalModel->set();
    }
}
