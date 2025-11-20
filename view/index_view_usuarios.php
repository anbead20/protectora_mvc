<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios - Adrián Anta Bellido</title>
</head>

<body>
    <h1>Lista de Usuarios</h1>

    <?php if (!empty($data['usuarios'])): ?>
        <ul>
            <?php foreach ($data['usuarios'] as $usuario): ?>
                <li>
                    ID: <?= htmlspecialchars($usuario['id']) ?> |
                    Username: <?= htmlspecialchars($usuario['username']) ?> |
                    Email: <?= htmlspecialchars($usuario['email']) ?> |
                    Teléfono: <?= htmlspecialchars($usuario['telefono']) ?> |
                    Nombre completo: <?= htmlspecialchars($usuario['nombre']) ?> <?= htmlspecialchars($usuario['apellido']) ?> |
                    Rol: <?= htmlspecialchars($usuario['rol']) ?> |
                    Último Login: <?= $usuario['ultimo_login'] ? htmlspecialchars($usuario['ultimo_login']) : 'Nunca' ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No hay usuarios registrados.</p>
    <?php endif; ?>

    <?php if (!empty($data['message'])): ?>
        <p><strong><?= htmlspecialchars($data['message']) ?></strong></p>
    <?php endif; ?>

</body>

</html>