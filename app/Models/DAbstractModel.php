<?php

namespace App\Models;

abstract class DAbstractModel
{
    // Configuración de la base de datos (asegúrate de tener estas constantes definidas)
    private static $db_host = "DBHOST";
    private static $db_user = "DBUSER";
    private static $db_pass = "DBPASS";
    private static $db_name = "DBNAME";
    private static $db_port = "DBPORT";

    // Conexión singleton
    private static $connection = null;

    // Propiedades para manejo de errores y resultados
    protected $error = false;
    protected $message = '';
    protected $query;
    protected $params = [];
    protected $row = [];
    protected $affected_rows = 0;

    // Métodos abstractos que deben implementar las clases hijas
    abstract protected function get($id = '');   // READ
    abstract protected function set();           // CREATE
    abstract protected function delete($id = ''); // DELETE
    abstract protected function edit();          // UPDATE

    // Obtener la conexión (singleton)
    protected function getConnection()
    {
        if (self::$connection === null) {
            self::$connection = $this->open_connection();
        }
        return self::$connection;
    }

    // Abrir la conexión a la base de datos
    protected function open_connection()
    {
        $dsn = sprintf(
            "mysql:host=%s;port=%s;dbname=%s;charset=utf8",
            self::$db_host,
            self::$db_port,
            self::$db_name
        );

        try {
            $pdo = new \PDO($dsn, self::$db_user, self::$db_pass);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $th) {
            // Guardamos el error y relanzamos la excepción
            $this->error = true;
            $this->message = $th->getMessage();
            throw $th;
        }

        return $pdo;
    }
}
