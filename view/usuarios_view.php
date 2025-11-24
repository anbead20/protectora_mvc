<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios - Adrián Anta Bellido</title>
    <link rel="stylesheet" href="../public/css/usuarios.css">
</head>

<body>
    <header class="header">
        <h1>Lista de Usuarios</h1>
        <p>Usuarios registrados en el sistema</p>
    </header>

    <main class="table-container">
        <?php if (!empty($data['usuarios'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Nombre completo</th>
                        <th>Rol</th>
                        <th>Último Login</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['usuarios'] as $usuario): ?>
                        <tr>
                            <td><?= htmlspecialchars($usuario['id']) ?></td>
                            <td><?= htmlspecialchars($usuario['username']) ?></td>
                            <td><?= htmlspecialchars($usuario['email']) ?></td>
                            <td><?= htmlspecialchars($usuario['telefono']) ?></td>
                            <td><?= htmlspecialchars($usuario['nombre']) ?> <?= htmlspecialchars($usuario['apellido']) ?></td>
                            <td><?= htmlspecialchars($usuario['rol']) ?></td>
                            <td><?= $usuario['ultimo_login'] ? htmlspecialchars($usuario['ultimo_login']) : 'Nunca' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay usuarios registrados.</p>
        <?php endif; ?>

        <?php if (!empty($data['message'])): ?>
            <p><strong><?= htmlspecialchars($data['message']) ?></strong></p>
        <?php endif; ?>

        <!-- Botón para volver al inicio -->
        <div class="back-home">
            <a href="<?= DIRBASEURL ?>" class="btn btn-home">⬅ Volver al inicio</a>
        </div>
    </main>

    <footer class="footer">
        <p>&copy; <?= date('Y'); ?> ProtectoraMVC - Todos los derechos reservados</p>
    </footer>
</body>

</html>