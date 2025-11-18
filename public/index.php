<?php

require_once("../vendor/autoload.php");
require_once("../app/Config/config.php");

use App\Core\Router;
use App\Controllers\AnimalController;
use App\Services\AnimalService;
use App\Models\AnimalModel;

// Creamos el enrutador
$router = new Router();

// Definimos rutas
$router->add([
    'name'   => 'animal_index',
    'path'   => '/^\/animales$/',
    'action' => [AnimalController::class, 'IndexAction']
]);

$router->add([
    'name'   => 'animal_show',
    'path'   => '/^\/animal\/([0-9]+)$/',
    'action' => [AnimalController::class, 'ShowAction']
]);

$router->add([
    'name'   => 'animal_create',
    'path'   => '/^\/animal\/crear$/',
    'action' => [AnimalController::class, 'CreateAction']
]);

$router->add([
    'name'   => 'animal_update',
    'path'   => '/^\/animal\/editar\/([0-9]+)$/',
    'action' => [AnimalController::class, 'UpdateAction']
]);

$router->add([
    'name'   => 'animal_delete',
    'path'   => '/^\/animal\/eliminar\/([0-9]+)$/',
    'action' => [AnimalController::class, 'DeleteAction']
]);

// Obtenemos la ruta de la petición
$baseUrl = defined('DIRBASEURL') ? DIRBASEURL : '';
$request = str_replace($baseUrl, '', $_SERVER['REQUEST_URI']);

// Buscamos coincidencia
$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName     = $route['action'][1];

    // Inyectamos el servicio en AnimalController
    $animalModel   = new AnimalModel();
    $animalService = new AnimalService($animalModel);
    $controller    = new $controllerName($animalService);

    // Ejecutamos la acción
    $controller->$actionName($request);
} else {
    echo "No route";
}
