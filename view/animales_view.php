<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Animales - Adrián Anta Bellido</title>
    <link rel="stylesheet" href="<?= DIRBASEURL ?>/css/animales.css?v=<?= time() ?>">
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['animals'] as $animal): ?>
                        <tr>
                            <td><?= htmlspecialchars($animal['id']) ?></td>
                            <td><?= htmlspecialchars($animal['nombre']) ?></td>
                            <td><?= $animal['raza'] ? htmlspecialchars($animal['raza']) : 'Sin raza' ?></td>
                            <td><?= htmlspecialchars($animal['edad']) ?> años</td>
                            <td>
                                <a href="<?= DIRBASEURL ?>/animales/editar/<?= $animal['id'] ?>" class="btn btn-edit">Editar</a>
                                <form method="POST" action="<?= DIRBASEURL ?>/animales/eliminar/<?= $animal['id'] ?>" style="display:inline;">
                                    <button type="submit" class="btn btn-delete"
                                        onclick="return confirm('¿Seguro que quieres eliminar este animal?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay animales registrados.</p>
        <?php endif; ?>

        <div class="back-home">
            <a href="<?= DIRBASEURL ?>" class="btn btn-home">⬅ Volver al inicio</a>
        </div>
    </main>

    <footer class="footer">
        <p>&copy; <?= date('Y'); ?> ProtectoraMVC - Todos los derechos reservados</p>
    </footer>
</body>

</html>