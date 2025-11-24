<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Animales - Adrián Anta Bellido</title>
    <link rel="stylesheet" href="../public/css/animales.css">
</head>

<body>
    <header class="header">
        <h1>Lista de Animales</h1>
        <p>Animales registrados en la protectora</p>
    </header>

    <main class="table-container">
        <?php if (!empty($data['animals'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Raza</th>
                        <th>Edad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['animals'] as $animal): ?>
                        <tr>
                            <td><?= htmlspecialchars($animal['id']) ?></td>
                            <td><?= htmlspecialchars($animal['nombre']) ?></td>
                            <td><?= $animal['raza'] ? htmlspecialchars($animal['raza']) : 'Sin raza' ?></td>
                            <td><?= htmlspecialchars($animal['edad']) ?> años</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay animales registrados.</p>
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