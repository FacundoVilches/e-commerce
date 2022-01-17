<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
    autenticar();
    //require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
    require 'funciones/categorias.php';
    require 'funciones/productos.php';
    $producto = verProductoPorID();
    $marcas = listarMarcas();
    $categorias = listarCategorias();
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Modificación de un producto</h1>

        <div class="alert bg-light p-4 col-8 mx-auto shadow">
            <form action="modificarProducto.php" method="post" enctype="multipart/form-data">

                <div class="form-group mb-4">
                    <label for="prdNombre">Nombre del Producto</label>
                    <input type="text" value="<?= $producto['prdNombre'] ?>" name="prdNombre"
                           class="form-control" id="prdNombre" required>
                </div>

                <label for="prdPrecio">Precio del Producto</label>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                    </div>
                    <input type="number" name="prdPrecio"
                           class="form-control" id="prdPrecio" value="<?= $producto['prdPrecio'] ?>" min="0" step="0.01" required>
                </div>

                <div class="form-group mb-4">
                    <label for="idMarca">Marca</label>
                    <select class="form-select" name="idMarca" id="idMarca" required>
                        <option value="">Seleccione una marca</option>
                    <?php
                    while ($marca = mysqli_fetch_assoc($marcas)){
                    ?>
                        <option <?= ( $producto['idMarca'] == $marca['idMarca'] ) ? 'selected' : '' ?>
                    value=" <?= $marca['idMarca'] ?> "><?= $marca['mkNombre'] ?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>

                <div class="form-group mb-4">
                    <label for="idCategoria">Categoría</label>
                    <select class="form-select" name="idCategoria" id="idCategoria" required>
                        <option value="">Seleccione una categoría</option>
                        <?php
                        while ($categoria = mysqli_fetch_assoc($categorias)){
                        ?>
                        <option <?= ( $producto['idCategoria'] == $categoria['idCategoria'] ) ? 'selected' : '' ?>
 value="<?= $categoria['idCategoria'] ?>"><?= $categoria['catNombre'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group mb-4">
                    <label for="prdPresentacion">Presentación del Producto</label>
                    <textarea name="prdPresentacion" class="form-control" id="prdPresentacion" rows="3" required><?= $producto['prdPresentacion'] ?></textarea>
                </div>

                <div class="form-group mb-4">
                    <label for="prdStock">Stock del Producto</label>
                    <input type="number" name="prdStock" value="<?= $producto['prdStock'] ?>" class="form-control" id="prdStock" min="0" required>
                </div>
                        Imagen actual: <br>
                        <img src="productos/<?= $producto['prdImagen'] ?>" class="img-thumbnail m-3" alt="">
                        <br>
                        Modificar imagen (opcional) <br>
                <div class="form-group mt-1 mb-4">
                    <label for="formFile" class="form-label">Seleccionar archivo:</label>
                    <input type="file" name="prdImagen" value="" class="form-control" id="formFile">
                </div>
                
                <input type="hidden" name="idProducto" value="<?= $producto['idProducto'] ?>">
                <input type="hidden" name="imgActual" value="<?= $producto['prdImagen'] ?>">

                <button class="btn btn-dark px-4">Modificar producto</button>
                <a href="adminProductos.php" class="btn btn-outline-secondary">
                    Volver a panel de productos
                </a>

            </form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>