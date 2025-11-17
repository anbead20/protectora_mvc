<?php

/**
 * @package App\Bootstrap
 */

// Definir constantes de rutas principales en el sistema de archivos. No en host (http)
define('APP_ROOT', realpath(__DIR__ . '/../../'));
define('APP_DIR', APP_ROOT . '/app');
define('PUBLIC_DIR', APP_ROOT . '/public');
define('VENDOR_DIR', APP_ROOT . '/vendor');
define('VIEWS_DIR', APP_ROOT . '/views');

// Cargar configuración básica de la aplicación
require_once APP_DIR . '/config/parametros.php';

// Cargar autoloader de Composer
require_once VENDOR_DIR . '/autoload.php';

use Dotenv\Dotenv;

try {
    $dotenv = Dotenv::createImmutable(APP_ROOT);
    $dotenv->load();
    $dotenv->required(['DBHOST', 'DBNAME', 'DBUSER', 'DBPASS', 'DBPORT'])->notEmpty();
} catch (Exception $e) {
    // Manejar la excepción si el archivo .env no se encuentra o no se puede cargar
    error_log("Error loading .env file: " . $e->getMessage());
}
