<?php

namespace App\Services;

use App\Models\UsuarioModel;

class AuthUserService
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
        $this->usuarioModel->setTipo($data['rol'] ?? 'usuario');
        $this->usuarioModel->setUltimoLogin($data['ultimo_login']);

        return $this->usuarioModel->set();
    }

    public function login(array $data)
    {
        $user = $this->usuarioModel->getByUsername($data['username']);

        if (!$user) {
            throw new \Exception("Usuario no encontrado");
        }

        if (!password_verify($data['password'], $user['password'])) {
            throw new \Exception("Contraseña incorrecta");
        }

        return $user;
    }
}
