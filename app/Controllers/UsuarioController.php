<?php

namespace App\Controllers;

use App\Services\UsuarioService;

class UsuarioController extends BaseController
{
    private $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    // Acción para listar todos los usuarios
    public function IndexAction()
    {
        $usuarios = $this->usuarioService->getAllUsuarios();

        $data = ['usuarios' => $usuarios];

        $this->renderHTML(__DIR__ . '/../../view/usuarios_view.php', $data);
    }

    // Acción para mostrar un usuario por ID
    public function ShowAction($request)
    {
        $partes = explode("/", $request);
        $id = end($partes);

        $usuario = $this->usuarioService->getUsuarioById((int)$id);

        $this->renderHTML(__DIR__ . '/../../view/usuarios_view.php', [
            'data' => ['usuarios' => [$usuario]]
        ]);
    }

    // Acción para crear un nuevo usuario
    public function CreateAction($request)
    {
        $usuario = $this->usuarioService->createUsuario($request);

        $this->renderHTML(__DIR__ . '/../../view/usuarios_view.php', [
            'data' => [
                'usuarios' => [$usuario],
                'message' => 'Usuario creado correctamente'
            ]
        ]);
    }

    // Acción para actualizar un usuario
    public function UpdateAction($request)
    {
        $partes = explode("/", $request['url']);
        $id = end($partes);

        $usuario = $this->usuarioService->updateUsuario((int)$id, $request['data']);

        $this->renderHTML(__DIR__ . '/../../view/usuarios_view.php', [
            'data' => [
                'usuarios' => [$usuario],
                'message' => 'Usuario actualizado correctamente'
            ]
        ]);
    }

    // Acción para eliminar un usuario
    public function DeleteAction($request)
    {
        $partes = explode("/", $request);
        $id = end($partes);

        $deleted = $this->usuarioService->deleteUsuario((int)$id);
        $message = $deleted ? 'Usuario eliminado correctamente' : 'Usuario no encontrado';

        $this->renderHTML(__DIR__ . '/../../view/usuarios_view.php', [
            'data' => [
                'usuarios' => [],
                'message' => $message
            ]
        ]);
    }
}
