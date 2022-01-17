<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
    autenticar();
    require 'funciones/conexion.php';
    require 'funciones/categorias.php';
    //require 'config/config.php';
    $cantidad = verificarProdPorCategoria();
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Baja de una categoría</h1>
        <?php
            if ($cantidad > 0){
        ?>
        <div class="alert alert-danger col-6 mx-auto">
            <i class="bi bi-exclamation-triangle"></i>
            No se puede eliminar la categoría ya que tiene productos relacionados
            <br>
            <a href="adminCategorias.php" class="btn btn-light mt-3">
                Volver a panel de categorías
            </a>
        </div>
<?php
    } else { 
        $categoria = verCategoriaPorID();
?>
        <div class="alert bg-light p-4 col-6 mx-auto shadow text-danger">
            Se eliminará la categoría: <span class="lead"><?=$categoria['catNombre'] ?></span>
            <form action="eliminarCategoria.php" method="post">
                <input type="hidden" name="idCategoria" value="<?=$categoria['idCategoria'] ?>">
                <button class="btn btn-danger my-3 px-4">Confirmar baja</button>
                <a href="adminCategorias.php" class="btn btn-outline-secondary">
                    Volver a panel de categorías
                </a>
            </form>
        </div>
    <?php
    }
    ?>
    </main>

<?php  include 'includes/footer.php';  ?>