<?php

namespace App\Services;

use App\Models\UsuarioModel;

class UsuarioService
{
    private $usuarioModel;

    public function __construct(UsuarioModel $usuarioModel)
    {
        $this->usuarioModel = $usuarioModel;
    }

    // Obtener todos los usuarios
    public function getAllUsuarios()
    {
        return $this->usuarioModel->getAll();
    }

    // Buscar un usuario por ID
    public function getUsuarioById(int $id)
    {
        return $this->usuarioModel->get($id);
    }

    // Crear un nuevo usuario
    public function createUsuario(array $data)
    {
        $this->usuarioModel->setUsername($data['username'] ?? null);
        $this->usuarioModel->setEmail($data['email_u'] ?? null);
        $this->usuarioModel->setTelefono($data['telefono'] ?? null);
        $this->usuarioModel->setPassword($data['password'] ?? null);
        $this->usuarioModel->setNombre($data['nombre'] ?? null);
        $this->usuarioModel->setApellido($data['apellido'] ?? null);
        $this->usuarioModel->setDireccion($data['direccion'] ?? null);
        $this->usuarioModel->setTipo($data['tipo_u'] ?? 'empleado');
        $this->usuarioModel->setUpdateAt($data['update_at'] ?? '0000-00-00');
        $this->usuarioModel->setUltimoLogin($data['ultimo_login'] ?? null);

        return $this->usuarioModel->set();
    }

    // Actualizar un usuario
    public function updateUsuario(int $id, array $data)
    {
        $this->usuarioModel->setId($id);
        $this->usuarioModel->setUsername($data['username'] ?? null);
        $this->usuarioModel->setEmail($data['email_u'] ?? null);
        $this->usuarioModel->setTelefono($data['telefono'] ?? null);
        $this->usuarioModel->setPassword($data['password'] ?? null);
        $this->usuarioModel->setNombre($data['nombre'] ?? null);
        $this->usuarioModel->setApellido($data['apellido'] ?? null);
        $this->usuarioModel->setDireccion($data['direccion'] ?? null);
        $this->usuarioModel->setTipo($data['tipo_u'] ?? 'empleado');
        $this->usuarioModel->setUpdateAt($data['update_at'] ?? date('Y-m-d'));
        $this->usuarioModel->setUltimoLogin($data['ultimo_login'] ?? null);

        return $this->usuarioModel->edit();
    }

    // Eliminar un usuario
    public function deleteUsuario(int $id)
    {
        return $this->usuarioModel->delete($id);
    }
}
