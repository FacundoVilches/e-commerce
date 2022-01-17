<?php
    ################################
    ###### CRUD de categorias ######
function listarCategorias(){
    $link = conectar();
    $sql = "SELECT idCategoria, catNombre
            FROM categorias";
    $resultado = mysqli_query($link, $sql) 
                    or die(mysqli_error($link));
    return $resultado;
}

function agregarCategoria(){
    $catNombre= $_POST['catNombre'];
    $link = conectar();
    $sql = "INSERT INTO categorias (catNombre) VALUES ('".$catNombre."')";
    $resultado = mysqli_query($link,$sql) 
                    or die(mysqli_error($link));
    return $resultado;
}
function verCategoriaPorID(){
    $idCategoria = $_GET['idCategoria'];
    $link = conectar();
    $sql = "SELECT idCategoria, catNombre
            FROM categorias
            WHERE idCategoria = ".$idCategoria;
    $resultado = mysqli_query($link,$sql)
                or die(mysqli_error($link));
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}

function modificarCategoria(){
    $catNombre = $_POST['catNombre'];
    $idCategoria = $_POST['idCategoria'];
    $link = conectar();
    $sql = "UPDATE categorias
            SET catNombre = '".$catNombre."'
            WHERE idCategoria = ".$idCategoria;
    $resultado = mysqli_query($link,$sql)
                or die(mysqli_error($link));
    return $resultado;
}

function verificarProdPorCategoria(){
    $idCategoria = $_GET['idCategoria'];
    $link = conectar();
    $sql = "SELECT 1 FROM productos
            WHERE  idCategoria =".$idCategoria;
    $resultado = mysqli_query($link,$sql)
                or die(mysqli_error($link));
    $cantidad = mysqli_num_rows($resultado);//devuelve la cantidad de registros que hay - devuelve numero
    return $cantidad;
}

function eliminarCategoria(){
    $idCategoria = $_POST['idCategoria'];
    $link = conectar();
    $sql = "DELETE FROM categorias
            WHERE idCategoria = ".$idCategoria;
    $resultado = mysqli_query($link,$sql)
                or die(mysqli_error($link));
    return $resultado;
}