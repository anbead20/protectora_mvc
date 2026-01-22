<?php

namespace App\Models;

class DatabaseException extends \Exception
{
    public function logError()
    {
        error_log($this->getMessage());
    }
    public function getUserMessage()
    {
        return "Ha ocurrido un error en la base de datos. Por favor, inténtelo de nuevo más tarde.";
    }
}
