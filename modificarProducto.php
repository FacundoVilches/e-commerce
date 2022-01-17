<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
    autenticar();
    //require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/productos.php';
    $chequeo = modificarProducto();
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Modificación de un producto</h1>
<?php
        if($chequeo==true){
?>
        <div class="alert alert-success col-7 mx-auto">
            Producto modificado correctamente
            <a href="adminProductos.php" class="btn btn-light m-2">
                Volver a panel de productos
            </a>

        </div>
<?php
    } else {
?>
        <div class="alert alert-danger col-7 mx-auto">
            No se pudo modificar el producto
            <a href="adminProductos.php" class="btn btn-light m-2">
                Volver a panel de productos
            </a>
        </div>
<?php
    }
?>   


    </main>

<?php  include 'includes/footer.php'; ?>