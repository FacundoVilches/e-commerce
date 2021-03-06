<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
    autenticar();
    require 'funciones/conexion.php';
    require 'funciones/categorias.php';
    $categoria = verCategoriaPorID();
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Modificación de una categoria</h1>

        <div class="alert bg-light p-4 col-8 mx-auto shadow">
            <form action="modificarCategoria.php" method="post">
                <div class="form-group">
                    <label for="catNombre">Nombre de la Categoria</label>
                    <input type="text" name="catNombre"
                            value="<?= $categoria['catNombre'] ?>"
                           class="form-control" id="catNombre" required>
                </div>
                <input type="hidden" name="idCategoria" value="<?=$categoria['idCategoria']?>">
                <button class="btn btn-dark my-3 px-4">Modificar categoria</button>
                <a href="adminCategorias.php" class="btn btn-outline-secondary">
                    Volver a panel de categorias
                </a>
            </form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>