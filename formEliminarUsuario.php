<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
    autenticar();
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    //require 'config/config.php';
    //$cantidad = verificarProdPorCategoria();
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Baja de un usuario</h1>
        <?php
            //if ($cantidad > 0){
        ?>
        <!-- <div class="alert alert-danger col-6 mx-auto">
            <i class="bi bi-exclamation-triangle"></i>
            No se puede eliminar al usuario
            <br>
            <a href="adminUsuarios.php" class="btn btn-light mt-3">
                Volver a panel de usuarios
            </a>
        </div> -->
<?php
    //} else { 
        $usuario = verUsuarioPorID();
?>
        <div class="alert bg-light p-4 col-6 mx-auto shadow text-secondary">
            Se eliminará el usuario: <br>
            Nombre: <span class="lead"><?=$usuario['usuNombre'] ?></span>
            <br>
            Apellido: <span class="lead"><?=$usuario['usuApellido'] ?></span>
            <br>
            Email: <span class="lead"><?=$usuario['usuEmail'] ?></span>
            <form action="eliminarUsuario.php" method="post">
                <input type="hidden" name="idUsuario" value="<?=$usuario['idUsuario'] ?>">
                <button class="btn btn-danger my-3 px-4">Confirmar baja</button>
                <a href="adminUsuarios.php" class="btn btn-outline-secondary">
                    Volver a panel de usuarios
                </a>
            </form>
        </div>
    <?php
    //}
    ?>
    </main>

<?php  include 'includes/footer.php';  ?>