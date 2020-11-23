<?php
session_name();
session_start();

if (isset($_SESSION['visitas'])) {
    echo "Hola " .session_name(); 
    echo "<br>";
   
    
   echo "Visita número: " .$_SESSION["visitas"] ++." En la fecha: ".$_COOKIE['ultimoAcceso'];
   
    
}else{
    echo "Bienvenido a nuestra página";
    $_SESSION["visitas"] = 1;
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

