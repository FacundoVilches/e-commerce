<?php


function listarProductos(){
    $link = conectar();
    $sql = "SELECT idProducto, prdNombre, prdPrecio, p.idMarca, mkNombre, p.idCategoria, catNombre, prdPresentacion, prdImagen
    FROM productos p
    JOIN marcas m
        ON m.idMarca = p.idMarca
    JOIN categorias c 
        ON p.idCategoria = c.idCategoria";
    /*
    SELECT idProducto, prdNombre, prdPrecio,
                       p.idMarca, mkNombre, 
                       p.idCategoria, catNombre, 
                       prdPresentacion, prdImagen
                    FROM productos p, marcas m, categorias c
                    WHERE p.idMarca = m.idMarca
                    AND p.idCategoria = c.idCategoria
    */
    $resultado = mysqli_query($link,$sql) 
                    or die(mysqli_error($link));
    return $resultado;
}

function verProductoPorID(){
    $idProducto = $_GET['idProducto'];
    $link = conectar();
    $sql = "SELECT idProducto, prdNombre, prdPrecio, p.idMarca, mkNombre, p.idCategoria, catNombre, prdPresentacion, prdImagen, prdStock
    FROM productos p
    JOIN marcas m
        ON m.idMarca = p.idMarca
    JOIN categorias c 
        ON p.idCategoria = c.idCategoria
        WHERE idProducto = ".$idProducto;
    $resultado = mysqli_query($link,$sql)
                or die(mysqli_error($link));
    $producto = mysqli_fetch_assoc($resultado);
    return $producto;
}

function subirImagen(){

    // enviaron imagen y está todo ok
    if( $_FILES['prdImagen']['error'] == 0 ){
        //ruta para guardar
        $path = 'productos/';
        //nombre y ubicación temporal
        $temp = $_FILES['prdImagen']['tmp_name'];
        // renombrar archivo
            //time() + extension
        $extension = pathinfo( $_FILES['prdImagen']['name'], PATHINFO_EXTENSION );
        $prdImagen = time().'.'.$extension;

        //movemos archivo
        move_uploaded_file( $temp, $path.$prdImagen );
    } else {
       $prdImagen = 'noDisponible.jpg';
        if(isset($_POST['imgActual'])){
        $prdImagen = $_POST['imgActual'];
    } 
    }
    return $prdImagen;
}

function agregarProducto(){
    $prdNombre = $_POST['prdNombre'];
    $prdPrecio = $_POST['prdPrecio'];
    $idMarca = $_POST['idMarca'];
    $idCategoria = $_POST['idCategoria'];
    $prdPresentacion = $_POST['prdPresentacion'];
    $prdStock = $_POST['prdStock'];
    //subir archivo
    $prdImagen = subirImagen();

    $link = conectar();
    $sql = "INSERT INTO productos VALUES( 
            DEFAULT, 
           '".$prdNombre."',
           ".$prdPrecio.", 
           ".$idMarca.", 
           ".$idCategoria.", 
           '".$prdPresentacion."', 
           ".$prdStock.", 
           '".$prdImagen."'
          )";
    $resultado = mysqli_query($link,$sql)
                or die(mysqli_error($link));
    return $resultado;
}

function modificarProducto(){
    $idProducto = $_POST['idProducto'];
    $prdNombre = $_POST['prdNombre'];
    $prdPrecio = $_POST['prdPrecio'];
    $idMarca = $_POST['idMarca'];
    $idCategoria = $_POST['idCategoria'];
    $prdPresentacion = $_POST['prdPresentacion'];
    $prdStock = $_POST['prdStock'];
    $prdImagen = subirImagen();
    $link = conectar();
    $sql = "UPDATE productos 
                    SET 
                        prdNombre       = '".$prdNombre."', 
                        prdPrecio       = ".$prdPrecio.", 
                        idMarca         = ".$idMarca.", 
                        idCategoria     = ".$idCategoria.",
                        prdPresentacion = '".$prdPresentacion."', 
                        prdStock        = ".$prdStock.", 
                        prdImagen       = '".$prdImagen."'
                    WHERE idProducto    = ".$idProducto;
    $resultado = mysqli_query($link,$sql)
                or die(mysqli_error($link));
    return $resultado;
}

function eliminarProducto(){
    $idProducto = $_POST['idProducto'];
    $link = conectar();
    $sql = "DELETE FROM productos
                WHERE idProducto = ".$idProducto;
    $resultado = mysqli_query($link,$sql)
                    or die(mysqli_error($link));
    return $resultado;
}

?>