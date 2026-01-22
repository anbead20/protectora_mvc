<?php
require_once __DIR__ . "/../../vendor/autoload.php";

function clearData($data)
{
    $data = trim($data); // Quita los espacios en blanco
    $data = stripslashes($data); // Escapea las barras
    $data = htmlspecialchars($data); // Sustituye todos los caracteres especiales
    return $data;
}
