<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= DIRBASEURL ?>/">ProtectoraMVC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="<?= DIRBASEURL ?>/animales">Animales</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= DIRBASEURL ?>/usuarios">Usuarios</a></li>
                <li> | </li>
                <?php if (isset($_SESSION['username'])): ?>
                    <!-- Si está logueado -->
                    <li class="nav-item"><a class="nav-link" href="<?= DIRBASEURL ?>/auth/user/logout">Cerrar sesión</a></li>
                <?php else: ?>
                    <!-- Si NO está logueado -->
                    <li class="nav-item"><a class="nav-link" href="<?= DIRBASEURL ?>/auth/user/login">Iniciar sesión</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>