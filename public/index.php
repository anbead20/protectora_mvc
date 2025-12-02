<?php
require_once __DIR__ . '/../app/bootstrap.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

// Controladores y servicios
use App\Controllers\IndexController;
use App\Controllers\AnimalController;
use App\Controllers\UsuarioController;
use App\Controllers\AuthUserController;
use App\Controllers\AuthAnimalController;

$router = new Router();

$router->get([
    'name' => 'principal',
    'path' => '/^\/?$/',
    'action' => [IndexController::class, 'IndexAction'],
    'method' => 'GET'
]);

$router->get([
    'name' => 'animales',
    'path' => '/^\/animales\/?$/',
    'action' => [AnimalController::class, 'IndexAction'],
    'method' => 'GET'
]);

$router->get([
    'name' => 'usuarios',
    'path' => '/^\/usuarios\/?$/',
    'action' => [UsuarioController::class, 'IndexAction'],
    'method' => 'GET'
]);

$router->get([
    'name' => 'register_user_form',
    'path' => '/^\/auth\/user\/register\/?$/',
    'action' => [AuthUserController::class, 'showRegisterFormAction'],
    'method' => 'GET'
]);

$router->post([
    'name' => 'register_user',
    'path' => '/^\/auth\/user\/register\/?$/',
    'action' => [AuthUserController::class, 'procesarRegisterFormAction'],
    'method' => 'POST'
]);

$router->get([
    'name' => 'register_animal_form',
    'path' => '/^\/auth\/animal\/register\/?$/',
    'action' => [AuthAnimalController::class, 'showRegisterFormAction'],
    'method' => 'GET'
]);

$router->post([
    'name' => 'register_animal',
    'path' => '/^\/auth\/animal\/register\/?$/',
    'action' => [AuthAnimalController::class, 'procesarRegisterFormAction'],
    'method' => 'POST'
]);

$router->get([
    'name' => 'login_form',
    'path' => '/^\/auth\/user\/login\/?$/',
    'action' => [AuthUserController::class, 'showLoginFormAction'],
    'method' => 'GET'
]);

$router->post([
    'name' => 'iniciar_sesion',
    'path' => '/^\/auth\/user\/login\/?$/',
    'action' => [AuthUserController::class, 'loginAction'],
    'method' => 'POST'
]);

$router->get([
    'name' => 'logout_form',
    'path' => '/^\/auth\/user\/logout\/?$/',
    'action' => [AuthUserController::class, 'showLogoutAction'],
    'method' => 'GET'
]);

$router->post([
    'name' => 'cerrar_sesion',
    'path' => '/^\/auth\/user\/logout\/?$/',
    'action' => [AuthUserController::class, 'logoutAction'],
    'method' => 'POST'
]);

// Obtenemos la URI y normalizamos la petición
$uri     = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = str_replace(DIRBASEURL, '', $uri);
$method  = $_SERVER['REQUEST_METHOD'];

// Buscamos la ruta
$route = $router->match($request, $method);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName();
} else {
    echo "No route. Ruta solicitada: " . $request;
}
