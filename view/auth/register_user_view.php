<div class="mb-4">
    <h2 class="fw-bold">Registro de usuario</h2>
</div>

<?php if (!empty($_GET['error'])): ?>
    <div class="alert alert-danger"><?= clearData($_GET['error']) ?></div>
<?php elseif (!empty($_GET['success'])): ?>
    <div class="alert alert-success">Usuario registrado correctamente</div>
<?php endif; ?>

<form method="POST" action="<?= DIRBASEURL ?>/auth/user/register" class="bg-white p-4 rounded shadow-sm">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="username" class="form-label">Usuario</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" pattern="[0-9]{9}">
        </div>

        <div class="col-md-6">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control">
        </div>

        <div class="col-12">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" id="direccion" class="form-control">
        </div>

        <div class="col-12">
            <label for="rol" class="form-label">Rol</label>
            <select name="rol" id="rol" class="form-select">
                <option value="empleado">Empleado</option>
                <option value="administrador">Administrador</option>
                <option value="voluntario">Voluntario</option>
                <option value="usuario" selected>Usuario</option>
            </select>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary">Registrarse</button>
        <a href="<?= DIRBASEURL ?>" class="btn btn-secondary ms-2">⬅ Volver al inicio</a>
    </div>
</form>