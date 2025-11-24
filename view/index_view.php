<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>ProtectoraMVC - Adrián Anta Bellido</title>
    <link rel="stylesheet" href="../public/css/index.css">
</head>

<body>
    <header class="header">
        <h1>ProtectoraMVC</h1>
        <p>Bienvenido a la plataforma de gestión de animales y usuarios</p>
    </header>

    <main class="main">
        <div class="menu">
            <a href="animales" class="card">
                <h2>Gestión de Animales</h2>
                <p>Registrar, editar y ver mascotas</p>
            </a>
            <a href="usuarios" class="card">
                <h2>Gestión de Usuarios</h2>
                <p>Administrar usuarios registrados</p>
            </a>
        </div>
    </main>

    <footer class="footer">
        <p>&copy; <?= date('Y'); ?> ProtectoraMVC - Todos los derechos reservados</p>
    </footer>
</body>

</html>