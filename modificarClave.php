<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
    autenticar();
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $chequeo = modificarClave();
    include 'includes/header.html';
    include 'includes/nav.php';
?>
 <main class="container">
        <h1>Modificación de contraseña</h1>
<?php
        if($chequeo==true){
?>
        <div class="alert alert-success col-7 mx-auto">
            Contraseña modificada correctamente
        </div>
<?php
    } else {
?>
        <div class="alert alert-danger col-7 mx-auto">
            No se pudo modificar la contraseña
        </div>
<?php
    }
?>   


    </main>

<?php  include 'includes/footer.php';  ?>