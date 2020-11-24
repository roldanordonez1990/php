<?php
session_name($_COOKIE['nombreUsuario']);
session_start();

if (isset($_SESSION['visitas'])) {
    echo "Hola " .session_name(); 
    echo "<br>";
   
    
   //echo "Visita número: " .$_SESSION["visitas"] ++." En la fecha: ".$_COOKIE['ultimoAcceso'];
   foreach ($_SESSION["visitas"] as $values){
       echo $values."<br>";
   }
   $_SESSION["visitas"][] = $_COOKIE['ultimoAcceso'];
    
}else{
    echo "Bienvenido a nuestra página";
    $_SESSION["visitas"][] = $_COOKIE['ultimoAcceso'];
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

