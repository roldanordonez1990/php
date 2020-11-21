<?php
session_start();
if (isset($_SESSION['visitas'])) {
    echo "Hola " . session_name($_COOKIE['nombreUsuario']);
    echo "<br>";
    echo "Contador de visitas:";
    foreach ($_SESSION["visitas"] as $visita) {
        echo $visita . "<br>";
    } 
}else{
    echo "Bienvenido a nuestra página";
    $_SESSION["visitas"][] = mktime();
}
?>
<html>
    <head></head>
    <body>
        <form action="Ejercicio_Sesion.php" method="post">

            <input type="submit" name="volver" value="Volver">
        </form>
    </body>
</html>

