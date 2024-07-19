<div class="container">
    <div class="text-center mb-5">
        <h1 class="display-4">SynergyPath</h1>
        <p class="lead">Potenciando el éxito a través del trabajo en equipo</p>
    </div>
    <div>
        <?php if(session()->has('errores')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach(session('errores') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
    <div class="card card-formulario-registro">
        <div class="card-body">
            <h2 class="card-title"><?= isset($usuario) ? 'Editar Usuario' : 'Nuevo Usuario' ?></h2>
            <form method="post" action="<?= isset($usuario) ? base_url('/actualizar/'.$usuario['codUsuario']) : base_url('/registro') ?>">
                <div class="mb-3">
                    <label for="registroNombre" class="form-label">Nombre Completo</label>
                    <input name='nombre_completo' type="text" class="form-control" id="registroNombre" value="<?= isset($usuario) ? esc($usuario['nombre_completo']) : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="registroUsuario" class="form-label">Usuario</label>
                    <input name='usuario' type="text" class="form-control" id="registroUsuario" value="<?= isset($usuario) ? esc($usuario['usuario']) : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="registroEmail" class="form-label">Correo Electrónico</label>
                    <input name='correo' type="email" class="form-control" id="registroEmail" value="<?= isset($usuario) ? esc($usuario['correo']) : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="registroTelefono" class="form-label">Teléfono</label>
                    <input name='telefono' type="tel" class="form-control" id="registroTelefono" value="<?= isset($usuario) ? esc($usuario['telefono']) : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="registroDireccion" class="form-label">Dirección</label>
                    <input name='direccion' type="text" class="form-control" id="registroDireccion" value="<?= isset($usuario) ? esc($usuario['direccion']) : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="registroPassword" class="form-label">Contraseña <?= isset($usuario) ? '(deja en blanco para mantener la misma)' : '' ?></label>
                    <input name='password' type="password" class="form-control" id="registroPassword" placeholder="Contraseña" <?= !isset($usuario) ? 'required' : '' ?>>
                </div>
                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-primary me-3"><?= isset($usuario) ? 'Actualizar' : 'Registrarse' ?></button>
                </div>
            </form>
            <div>
                <p class>Ya tienes una cuenta? <span><a href="/login">Inicia Sesion</a></span></p>
            </div>
        </div>
    </div>
</div>
