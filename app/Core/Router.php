<?php

namespace App\Core;

class Router
{
    private $routes = [];

    /**
     * Añade una ruta al enrutador
     *
     * @param string $method GET, POST, etc.
     * @param string $path   Expresión regular de la ruta
     * @param array  $action [Controller::class, 'method']
     */
    public function add(string $method, string $path, array $action)
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path'   => $path,
            'action' => $action
        ];
    }

    public function get(string $path, array $action)
    {
        $this->add('GET', $path, $action);
    }

    public function post(string $path, array $action)
    {
        $this->add('POST', $path, $action);
    }

    /**
     * Busca coincidencia entre la petición y las rutas registradas
     *
     * @param string $request URI
     * @param string $method  Método HTTP
     * @return array|null
     */
    public function match(string $request, string $method)
    {
        foreach ($this->routes as $route) {
            if (
                $route['method'] === strtoupper($method) &&
                preg_match($route['path'], $request, $matches)
            ) {
                $route['params'] = $matches;
                return $route;
            }
        }
        return null;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
}
