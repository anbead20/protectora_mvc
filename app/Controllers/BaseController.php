<?php

namespace App\Controllers;

class BaseController
{
    /**
     * Renderiza una vista HTML y le pasa datos
     *
     * @param string $viewPath Ruta del archivo de vista
     * @param array $data Datos que se enviarán a la vista
     */
    protected function renderHTML(string $viewPath, array $data = [])
    {
        extract($data);
        require $viewPath;
    }
}
