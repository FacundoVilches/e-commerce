<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
    autenticar();
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $chequeo = agregarUsuario();
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Alta de un usuario</h1>
<?php
        if($chequeo==true){
?>
        <div class="alert alert-success col-7 mx-auto">
            Usuario agregad0 correctamente
            <a href="adminUsuarios.php" class="btn btn-light m-2">
                Volver a panel de usuarios
            </a>

        </div>
<?php
    } else {
?>
        <div class="alert alert-danger col-7 mx-auto">
            No se pudo agregar el usuario
            <a href="adminUsuarioss.php" class="btn btn-light m-2">
                Volver a panel de usuarios
            </a>
        </div>
<?php
    }
?>   


    </main>

<?php  include 'includes/footer.php';  ?>