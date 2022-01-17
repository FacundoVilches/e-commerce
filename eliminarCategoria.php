<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
    autenticar();
    require 'funciones/conexion.php';
    require 'funciones/categorias.php';
    $chequeo = eliminarCategoria();
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Baja de una categoría</h1>
<?php
        if($chequeo==true){
?>
        <div class="alert alert-success col-7 mx-auto">
            Categoría eliminada correctamente
            <a href="adminCategorias.php" class="btn btn-light m-2">
                Volver a panel de categorías
            </a>

        </div>
<?php
    } else {
?>
        <div class="alert alert-danger col-7 mx-auto">
            No se pudo eliminar la categoría
            <a href="adminCategorias.php" class="btn btn-light m-2">
                Volver a panel de categorías
            </a>
        </div>
<?php
    }
?>   


    </main>

<?php  include 'includes/footer.php';  ?>