<?php
session_name();
session_start();

// Si no existe variable de sesión nombre, no entre directamente aquí
if (!$_SESSION['nombre']) {
    header('location: login.php');
}else{
    setcookie(session_name(), "", time()-3600, "/");
    session_unset();
    session_destroy();
     header('location: login.php');
}


?>