<?php
session_name();
session_start();

// Si no existe variable de sesión nombre, no entre directamente aquí
if (!$_SESSION['nombre']) {
    header('location: login.php');
}

if (isset($_POST['pagar'])) {
    unset($_SESSION['cesta']);
}
?>
<html>
    <head>
        <link href="styles.css" rel="stylesheet" type="text/css">
        </head>
    <body>
        <span>Compra realizada con éxito</span>
        <br>
        <form action="productos.php" method="post">

            <input type="submit" name="volver" value="Volver a comprar">
        </form>
    </body>

</html>
