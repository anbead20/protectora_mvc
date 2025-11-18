<?php
require_once __DIR__ . '/../app/bootstrap.php';
require_once("../vendor/autoload.php");
require_once("../app/Config/config.php");

use App\Core\Router;
use App\Controllers\AnimalController;
use App\Services\AnimalService;
use App\Models\AnimalModel;

$router = new Router();

// rutas
$router->add([
    'name'   => 'animal_index_default',
    'path'   => '/^\/?$/',   // raíz
    'action' => [AnimalController::class, 'IndexAction']
]);

$router->add([
    'name'   => 'animal_index',
    'path'   => '/^\/animales\/?$/',
    'action' => [AnimalController::class, 'IndexAction']
]);

// aquí definimos $uri y $request
$uri     = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = str_replace(DIRBASEURL, '', $uri);

$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName     = $route['action'][1];

    $animalModel   = new AnimalModel();
    $animalService = new AnimalService($animalModel);
    $controller    = new $controllerName($animalService);

    if ($actionName === 'IndexAction') {
        $controller->IndexAction();
    } else {
        $controller->$actionName($request);
    }
} else {
    echo "No route";
}
