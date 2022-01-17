<?php

session_start();

unset($_SESSION['numero']);
session_unset();//Borra todas las variables de sesion
session_destroy();//Borra la sesión

?>