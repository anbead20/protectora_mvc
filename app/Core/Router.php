<?php

namespace App\Core;

class Router
{
    private $routes = [];

    public function get(array $route)
    {
        $this->routes[] = [
            'name'   => $route['name'],
            'path'   => $route['path'],
            'action' => $route['action'],
            'method' => 'GET'
        ];
    }

    public function post(array $route)
    {
        $this->routes[] = [
            'name'   => $route['name'],
            'path'   => $route['path'],
            'action' => $route['action'],
            'method' => 'POST'
        ];
    }

    public function match(string $request, string $method)
    {
        foreach ($this->routes as $route) {
            // Comprobamos método y expresión regular
            if (
                strtoupper($method) === $route['method'] &&
                preg_match($route['path'], $request, $matches)
            ) {
                array_shift($matches); // quitamos coincidencia completa
                $route['params'] = $matches;
                return $route;
            }
        }
        return null;
    }
}
