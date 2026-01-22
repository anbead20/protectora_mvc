<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4">Iniciar Sesión</h2>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger">
                    <?= clearData(urldecode($_GET['error'])) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?= DIRBASEURL ?>/auth/user/login">
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</div>