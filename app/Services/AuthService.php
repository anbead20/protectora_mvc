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
        if (empty($data['username']) || empty($data['email']) || empty($data['password'])) {
            return false;
        }
        return $this->usuarioModel->insert($data);
    }
}
