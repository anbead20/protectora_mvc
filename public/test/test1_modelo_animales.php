<?php

require_once '../../vendor/autoload.php';

define('DBHOST', 'localhost');
define('DBNAME', 'mascotas');
define('DBUSER', 'mascotas');
define('DBPASS', 'mascotas');
define('DBPORT', '3306');

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
