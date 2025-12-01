<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'ProtectoraMVC' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <?php include_once __DIR__ . '/../includes/nav_view.php'; ?>

    <div class="container-fluid flex-grow-1">
        <div class="row">
            <!-- Sidebar -->
            <?php include_once __DIR__ . '/../includes/sidebar_view.php'; ?>

            <!-- Contenido principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <?= $content ?? '' ?>
            </main>
        </div>
    </div>

    <!-- Footer -->
    <?php include_once __DIR__ . '/../includes/footer_view.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>