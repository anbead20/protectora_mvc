<div class="mb-4">
    <h2 class="fw-bold">Lista de Usuarios</h2>
    <p class="text-muted">Usuarios registrados en el sistema</p>
</div>

<?php if (!empty($data['usuarios'])): ?>
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-primary">
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
    </div>
<?php else: ?>
    <div class="alert alert-warning">No hay usuarios registrados.</div>
<?php endif; ?>

<?php if (!empty($data['message'])): ?>
    <div class="alert alert-info mt-3">
        <strong><?= htmlspecialchars($data['message']) ?></strong>
    </div>
<?php endif; ?>

<div class="mt-4">
    <a href="<?= DIRBASEURL ?>" class="btn btn-secondary">⬅ Volver al inicio</a>
</div>