<?php
require_once __DIR__ . '/../app/bootstrap.php';
require_once("../vendor/autoload.php");
require_once("../app/Config/config.php");

use App\Core\Router;
use App\Controllers\AnimalController;
use App\Services\AnimalService;
use App\Models\AnimalModel;

use App\Controllers\UsuarioController;
use App\Services\UsuarioService;
use App\Models\UsuarioModel;

$router = new Router();

$router->add([
    'name'   => 'index_default',
    'path'   => '/^\/?$/',   // raíz
    'action' => [UsuarioController::class, 'IndexAction']
]);

$router->add([
    'name'   => 'animales_view',
    'path'   => '/^animales\/?$/',
    'action' => [AnimalController::class, 'IndexAction']
]);

$router->add([
    'name'   => 'usuarios_view',
    'path'   => '/^usuarios\/?$/',
    'action' => [UsuarioController::class, 'IndexAction']
]);

// aquí definimos $uri y $request
$uri     = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = str_replace(DIRBASEURL, '', $uri);

$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName     = $route['action'][1];

    // instanciamos según el controlador
    if ($controllerName === AnimalController::class) {
        $model     = new AnimalModel();
        $service   = new AnimalService($model);
        $controller = new $controllerName($service);
    } elseif ($controllerName === UsuarioController::class) {
        $model     = new UsuarioModel();
        $service   = new UsuarioService($model);
        $controller = new $controllerName($service);
    }

    if ($actionName === 'IndexAction') {
        $controller->IndexAction();
    } else {
        $controller->$actionName($request);
    }
} else {
    echo "No route";
}
