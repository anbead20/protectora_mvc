<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="../../public/css/register.css">
</head>

<body>
    <div class="form-container">
        <h2>Registro de usuario</h2>

        <?php if (!empty($_GET['error'])): ?>
            <p style="color:red"><?= htmlspecialchars($_GET['error']) ?></p>
        <?php elseif (!empty($_GET['success'])): ?>
            <p style="color:green">Usuario registrado correctamente</p>
        <?php endif; ?>

        <form method="POST" action="<?= DIRBASEURL ?>/auth/register">
            <label for="username">Usuario:</label>
            <input type="text" name="username" id="username" required>

            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" pattern="[0-9]{9}">

            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido">

            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion">

            <label for="rol">Rol:</label><br>
            <select name="rol" id="rol" style="width:100%; padding:12px; margin-bottom:20px; border:1px solid #ccc; border-radius:6px; font-size:14px;">
                <option value="empleado">Empleado</option>
                <option value="administrador">Administrador</option>
                <option value="voluntario">Voluntario</option>
                <option value="usuario" selected>Usuario</option>
            </select>

            <button type="submit">Registrarse</button>
        </form>
    </div>
</body>

</html>