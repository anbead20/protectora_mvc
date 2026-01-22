<div class="mb-4">
    <h2 class="fw-bold">Registro de animal</h2>
</div>

<?php if (!empty($_GET['error'])): ?>
    <div class="alert alert-danger"><?= clearData($_GET['error']) ?></div>
<?php elseif (!empty($_GET['success'])): ?>
    <div class="alert alert-success">Animal registrado correctamente</div>
<?php endif; ?>

<form method="POST" action="<?= DIRBASEURL ?>/auth/animal/register" class="bg-white p-4 rounded shadow-sm">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="raza" class="form-label">Raza</label>
        <input type="text" name="raza" id="raza" class="form-control">
    </div>

    <div class="mb-3">
        <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
        <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Registrar animal</button>
</form>

<div class="mt-4">
    <a href="<?= DIRBASEURL ?>" class="btn btn-secondary">⬅ Volver al inicio</a>
</div>