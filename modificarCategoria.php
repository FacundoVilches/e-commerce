<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
    autenticar();
    //require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/categorias.php';
    $chequeo = modificarCategoria();
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Modificación de una categoria</h1>
<?php
        if($chequeo==true){
?>
        <div class="alert alert-success col-7 mx-auto">
            Marca modificada correctamente
            <a href="adminCategorias.php" class="btn btn-light m-2">
                Volver a panel de categorias
            </a>

        </div>
<?php
    } else {
?>
        <div class="alert alert-danger col-7 mx-auto">
            No se pudo modificar la categorua
            <a href="adminCategorias.php" class="btn btn-light m-2">
                Volver a panel de categorias
            </a>
        </div>
<?php
    }
?>   


    </main>

<?php  include 'includes/footer.php';  ?>