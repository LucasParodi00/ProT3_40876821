<div class="container divLoginContainer">
    <div class="text-center mb-5"> 
        <h1 class="display-4">SynergyPath</h1>
        <p class="lead">Potenciando el éxito a través del trabajo en equipo</p>
    </div>

    <div class="card card-formulario-login">
        <div class="card-body">
            <h2 class="card-title">Inicio de Sesión</h2>
            <?php if(session()->has('errores')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach(session('errores') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>
            <form method="post" action="<?= base_url('/login') ?>">
                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Usuario</label>
                    <input name="usuario" type="text" class="form-control" id="loginEmail" placeholder="Nombre de usuario" required>
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Contraseña</label>
                    <input name="password" type="password" class="form-control" id="loginPassword" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-success">Iniciar Sesión</button>
            </form>
            <p class='text-center p-3'>No tienes una cuenta ? <span><a href="/registro">Registrate</a></span></p>
        </div>
    </div>
</div>
