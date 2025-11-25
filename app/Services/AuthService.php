<?php

namespace App\Services;

use App\Models\UsuarioModel;

class AuthService
{
    public $usuarioModel;

    public function __construct(UsuarioModel $usuarioModel)
    {
        $this->usuarioModel = $usuarioModel;
    }

    public function register(array $data)
    {
        $this->usuarioModel->setUsername($data['username']);
        $this->usuarioModel->setEmail($data['email']);
        $this->usuarioModel->setPassword($data['password']);
        $this->usuarioModel->setTelefono($data['telefono'] ?? '');
        $this->usuarioModel->setNombre($data['nombre'] ?? '');
        $this->usuarioModel->setApellido($data['apellido'] ?? '');
        $this->usuarioModel->setDireccion($data['direccion'] ?? '');
        $this->usuarioModel->setTipo('usuario');

        return $this->usuarioModel->set();
    }
}
