<?php
require_once __DIR__ . '/../app/bootstrap.php';
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Config/config.php';

use App\Core\Router;

// Controladores y servicios
use App\Controllers\IndexController;

use App\Controllers\AnimalController;
use App\Services\AnimalService;
use App\Models\AnimalModel;

use App\Controllers\UsuarioController;
use App\Services\UsuarioService;
use App\Models\UsuarioModel;

use App\Controllers\AuthController;
use App\Services\AuthService;

$router = new Router();

// Rutas principales
$router->get('/^\/?$/', [IndexController::class, 'IndexAction']);
$router->get('/^animales\/?$/', [AnimalController::class, 'IndexAction']);
$router->get('/^usuarios\/?$/', [UsuarioController::class, 'IndexAction']);

// Solo registro
$router->get('/^auth\/register$/', [AuthController::class, 'showRegisterFormAction']);
$router->post('/^auth\/register$/', [AuthController::class, 'procesarRegisterFormAction']);

// Obtenemos la URI y normalizamos la petición
$uri     = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = str_replace(DIRBASEURL, '', $uri);
$method  = $_SERVER['REQUEST_METHOD'];

// Buscamos la ruta
$route = $router->match($request, $method);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName     = $route['action'][1];

    // Instanciamos el controlador según corresponda
    if ($controllerName === AnimalController::class) {
        $model      = new AnimalModel();
        $service    = new AnimalService($model);
        $controller = new $controllerName($service);
    } elseif ($controllerName === UsuarioController::class) {
        $model      = new UsuarioModel();
        $service    = new UsuarioService($model);
        $controller = new $controllerName($service);
    } elseif ($controllerName === AuthController::class) {
        $model      = new UsuarioModel();
        $service    = new AuthService($model);
        $controller = new $controllerName($service);
    } elseif ($controllerName === IndexController::class) {
        $controller = new $controllerName();
    }

    // Ejecutamos la acción
    if (method_exists($controller, $actionName)) {
        $controller->$actionName($request);
    } else {
        echo "Acción no encontrada";
    }
} else {
    echo "Ruta no encontrada";
}
