<?php

if (isset($_POST['enviar']) && (isset($_POST['recordar']))) {

    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];
    $fecha = date('d-m-y h:i:s');

    setcookie('nombreUsuario', $nombre);
    setcookie('passUsuario', $pass);
    setcookie("ultimoAcceso", $fecha);
}



if (isset($_COOKIE['nombreUsuario']) && isset($_COOKIE['passUsuario']) && isset($_COOKIE['ultimoAcceso'])) {

    echo "Hola " . $_COOKIE['nombreUsuario'] . " ,su última visita fue:" . $_COOKIE['ultimoAcceso'];
}else {
    
    echo "Primer acceso";
}

?>

<form action="CookiesFormulario.php" method="post">
    
    <input type="submit" name="volver" value="Volver">
    <input type="hidden" name="nombre" value="<?php echo $_COOKIE['nombreUsuario'] ?>">
    <input type="hidden" name="pass" value="<?php echo $_COOKIE['passUsuario'] ?>">
    
</form>
