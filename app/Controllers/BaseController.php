<?php

namespace App\Controllers;

class BaseController
{
    public function renderHTML($filename, $data = [])
    {
        // Extraer las variables del array $data para que estén disponibles en la vista
        extract($data);

        // Capturar el contenido de la vista específica
        ob_start();
        include($filename);
        $content = ob_get_clean();

        // Incluir el layout base, que ya tiene nav, sidebar y footer
        include(__DIR__ . '/../../view/layouts/base_view.php');
    }
}
