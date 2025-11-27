<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de animal</title>
    <link rel="stylesheet" href="<?= DIRBASEURL ?>/css/register.css">
</head>

<body>
    <div class="form-container">
        <h2>Registro de animal</h2>

        <?php if (!empty($_GET['error'])): ?>
            <p style="color:red"><?= htmlspecialchars($_GET['error']) ?></p>
        <?php elseif (!empty($_GET['success'])): ?>
            <p style="color:green">Animal registrado correctamente</p>
        <?php endif; ?>

        <form method="POST" action="<?= DIRBASEURL ?>/auth/animal/register">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="raza">Raza:</label>
            <input type="text" name="raza" id="raza">

            <label for="fechaNacimiento">Fecha de nacimiento:</label>
            <input type="date" name="fechaNacimiento" id="fechaNacimiento" style="width:100%; padding:12px; margin-bottom:20px; border:1px solid #ccc; border-radius:6px; font-size:14px;" required>

            <button type="submit">Registrar animal</button>
        </form>
    </div>
</body>

</html>