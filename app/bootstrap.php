<?php

/**
 * @package App\Bootstrap
 */

// Definir constantes de rutas principales en el sistema de archivos. No en host (http)

define('APP_ROOT', realpath(__DIR__ . '/..'));
define('APP_DIR', APP_ROOT . '/app');
define('PUBLIC_DIR', APP_ROOT . '/public');
define('CONFIG_DIR', APP_ROOT . '/config');
define('VENDOR_DIR', APP_ROOT . '/vendor');
define('TMP_DIR', APP_ROOT . '/tmp');

require_once VENDOR_DIR . "/autoload.php";

use Dotenv\Dotenv;

try {
    $dotenv = Dotenv::createImmutable(APP_ROOT);
    $dotenv->load();

    $dotenv->required([
        "DBHOST",
        "DBNAME",
        "DBUSER",
        "DBPASS",
        "DBPORT"
    ])->notEmpty();
} catch (Exception $e) {
    die("Error cargando configuracion: " . $e->getMessage());
}

define('DB_HOST', $_ENV['DBHOST'] ?? 'localhost');
define('DB_NAME', $_ENV['DBNAME'] ?? 'protectora_mvc');
define('DB_USER', $_ENV['DBUSER'] ?? 'root');
define('DB_PASS', $_ENV['DBPASS'] ?? '');
define('DB_PORT', $_ENV['DBPORT'] ?? '3306');

define('APP_ENV', $_ENV['APP_ENV'] ?? 'development');
define('APP_DEBUG', filter_var($_ENV['APP_DEBUG'] ?? 'true', FILTER_VALIDATE_BOOLEAN));

if (APP_ENV === "development" || APP_DEBUG === true) {
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);
} else {
    ini_set("display_errors", 0);
    ini_set("display_startup_errors", 0);
    error_reporting(E_ALL & E_DEPRECATED);
}
