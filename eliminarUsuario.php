<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
    autenticar();
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $chequeo = eliminarUsuario();
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Baja de un usuario</h1>
<?php
        if($chequeo==true){
?>
        <div class="alert alert-success col-7 mx-auto">
            Usuario eliminado correctamente
            <a href="adminUsuarios.php" class="btn btn-light m-2">
                Volver a panel de usuarios
            </a>

        </div>
<?php
    } else {
?>
        <div class="alert alert-danger col-7 mx-auto">
            No se pudo eliminar el usuario
            <a href="adminUsuarios.php" class="btn btn-light m-2">
                Volver a panel de usuarios
            </a>
        </div>
<?php
    }
?>   


    </main>

<?php  include 'includes/footer.php';  ?>