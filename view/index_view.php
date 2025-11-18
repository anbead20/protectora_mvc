<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Animales - Adrián Anta Bellido</title>
</head>

<body>
    <h1>Lista de Animales</h1>

    <?php if (!empty($data['animals'])): ?>
        <ul>
            <?php foreach ($data['animals'] as $animal): ?>
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