<?php

namespace App\Core;

class Router
{
    private $routes = [];

    /**
     * Añade una ruta al enrutador
     *
     * @param array $route
     */
    public function add(array $route)
    {
        $this->routes[] = $route;
    }

    /**
     * Busca coincidencia entre la petición y las rutas registradas
     *
     * @param string $request
     * @return array|null
     */
    public function match(string $request)
    {
        foreach ($this->routes as $route) {
            if (preg_match($route['path'], $request, $matches)) {
                // Guardamos los parámetros capturados en la ruta
                $route['params'] = $matches;
                return $route;
            }
        }
        return null;
    }

    /**
     * Devuelve todas las rutas registradas (opcional)
     *
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}
