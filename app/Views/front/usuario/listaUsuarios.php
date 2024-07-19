
<script>
    function eliminarUsuario(codUsuario) {
        if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
            fetch(`<?= base_url('/eliminar/') ?>${codUsuario}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
                }
            })
            .then(response => {
                if (response.ok) {
                    window.location.reload(); 
                } else {
                    alert('No se pudo eliminar el usuario.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }
</script>


<div class="container-fluid d-flex flex-column justify-content-center align-items-center" style="height: 100vh; max-width: 1200px">
    <h1>Lista de Usuarios</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre y Apellido</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td><?= $usuario['codUsuario']; ?></td>
                    <td><?= $usuario['nombre_completo']; ?></td>
                    <td><?= $usuario['usuario']; ?></td>
                    <td><?= $usuario['correo']; ?></td>
                    <td><?= $usuario['telefono']; ?></td>
                    <td>
                        <a href="<?= base_url('/actualizar/'.$usuario['codUsuario']) ?>" class="btn btn-primary btn-sm">Editar</a>
                        <form action="<?= base_url('/eliminar/' . $usuario['codUsuario']) ?>" method="post" style="display:inline;">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</button>
                        </form>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

