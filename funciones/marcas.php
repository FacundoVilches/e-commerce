<?php
    ############################
    ###### CRUD de marcas ######
    
    function listarMarcas()
    {
        $link = conectar();
        $sql = "SELECT idMarca, mkNombre
            FROM marcas";
        $resultado = mysqli_query($link, $sql) //die va siempre que se use msqli_query
                        or die(mysqli_error($link));//die interrumpe el codigo e informa
        return $resultado;
    }

    function agregarMarca(){
        $mkNombre = $_POST['mkNombre'];
        $link = conectar();
        $sql = "INSERT INTO marcas (mkNombre) VALUES ('".$mkNombre."')";
        $resultado =  mysqli_query($link, $sql)
                        or die(mysqli_error($link));
        return $resultado;// si es un insert, update, delete retorna true
    }

    function verMarcaPorID(){
        $idMarca = $_GET['idMarca'];
        $link = conectar();
        $sql = "SELECT idMarca, mkNombre
                FROM marcas
                WHERE idMarca = ".$idMarca;
        $resultado = mysqli_query($link,$sql)
                    or die(mysqli_error($link));
        $marca = mysqli_fetch_assoc($resultado);
        return $marca;
    }

    function modificarMarca(){
        $mkNombre = $_POST['mkNombre'];
        $idMarca = $_POST['idMarca'];
        $link = conectar();
        $sql = "UPDATE marcas
                SET mkNombre = '".$mkNombre."'
                WHERE idMarca = ".$idMarca;
        $resultado = mysqli_query($link,$sql)
                    or die(mysqli_error($link));
        return $resultado;
    }

    function verificarProdPorMarca(){
        $idMarca = $_GET['idMarca'];
        $link = conectar();
        $sql = "SELECT 1 FROM productos
                WHERE  idMarca =".$idMarca;
        $resultado = mysqli_query($link,$sql)
                    or die(mysqli_error($link));
        $cantidad = mysqli_num_rows($resultado);//devuelve la cantidad de registros que hay - devuelve numero
        return $cantidad;
    }

    function eliminarMarca(){
        $idMarca = $_POST['idMarca'];
        $link = conectar();
        $sql = "DELETE FROM marcas
                WHERE idMarca = ".$idMarca;
        $resultado = mysqli_query($link,$sql)
                    or die(mysqli_error($link));
        return $resultado;
    }
?>