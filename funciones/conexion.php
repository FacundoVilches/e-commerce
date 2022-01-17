<?php

function conectar(){
    $link = mysqli_connect(
        'localhost',//hostname
        'root',//username-root
        '',//password-''
        'catalogo'//database-catalogo
    );
    return $link;
}

?>