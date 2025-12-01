<div class="mb-4">
    <h2 class="fw-bold">Lista de Animales</h2>
    <p class="text-muted">Animales registrados en la protectora</p>
</div>

<?php if (!empty($data['animals'])): ?>
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-success">
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
                            <a href="<?= DIRBASEURL ?>/animales/editar/<?= $animal['id'] ?>" class="btn btn-sm btn-outline-primary me-2">Editar</a>
                            <form method="POST" action="<?= DIRBASEURL ?>/animales/eliminar/<?= $animal['id'] ?>" class="d-inline">
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('¿Seguro que quieres eliminar este animal?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-warning">No hay animales registrados.</div>
<?php endif; ?>

<div class="mt-4">
    <a href="<?= DIRBASEURL ?>" class="btn btn-secondary">⬅ Volver al inicio</a>
</div>