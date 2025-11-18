<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Animales - Adrián Anta Bellido</title>
</head>

<body>
    <h1>Lista de Animales</h1>

    <?php if (!empty($animals)): ?>
        <ul>
            <?php foreach ($animals as $animal): ?>
                <li>
                    ID: <?= htmlspecialchars($animal['id']) ?> |
                    Nombre: <?= htmlspecialchars($animal['nombre']) ?> |
                    Raza: <?= htmlspecialchars($animal['raza']) ?> |
                    Fecha Nacimiento: <?= htmlspecialchars($animal['fechaNacimiento']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No hay animales registrados.</p>
    <?php endif; ?>
</body>

</html>