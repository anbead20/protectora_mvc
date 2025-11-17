<?php

require_once '../../vendor/autoload.php';

define('DB_HOST', 'localhost');
define('DB_NAME', 'mascotas');
define('DB_USER', 'mascotas');
define('DB_PASS', 'mascotas');
define('DB_PORT', '3306');

use App\Models\AnimalModel;

$animal = new AnimalModel();

// Prueba de inserción
echo "Prueba de inserción:\n";
$animal->setNombre('Firulais');
$animal->setRaza('Labrador');
$animalInsertado = $animal->set();
print_r($animalInsertado);
echo "<br>";

// Recuperar animal
echo "Recuperar animal:\n";
$animalRecuperado = $animal->get(2);
print_r($animalRecuperado);
echo "<br>";

// Modificación
echo "Modificación de animal:\n";
$animal->setId(1);
$animal->setNombre('Max');
$animal->setRaza('Golden Retriever');
$animalModificado = $animal->edit();
print_r($animalModificado);
echo "<br>";
