<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
    autenticar();
    //require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $chequeo = modificarUsuario();
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Modificación de un usuario</h1>
<?php
        if($chequeo==true){
?>
        <div class="alert alert-success col-7 mx-auto">
            Usuario modificado correctamente
            <a href="adminUsuarios.php" class="btn btn-light m-2">
                Volver a panel de marcas
            </a>

        </div>
<?php
    } else {
?>
        <div class="alert alert-danger col-7 mx-auto">
            No se pudo modificar el usuario
            <a href="adminUsuario.php" class="btn btn-light m-2">
                Volver a panel de marcas
            </a>
        </div>
<?php
    }
?>   


    </main>

<?php  include 'includes/footer.php';  ?>