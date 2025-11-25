<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de usuario</title>
</head>

<body>
    <h2>Registro de usuario</h2>

    <?php if (!empty($message)): ?>
        <p style="color:green"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form method="POST" action="<?= DIRBASEURL ?>auth/register">
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Registrarse</button>
    </form>
</body>

</html>