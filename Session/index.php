<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       //Iniciamos la sesión. Dehe estar antes de que salga nada por pantalla, xq debe de ser lo primero qeu se mande
       session_start();
       echo session_id(). "<br>"; //valor
       echo session_name()."<br>"; //name
       $_SESSION['nombre']="Fran";
       echo $_SESSION['nombre']."<br>";
       
        ?>
        <a href="MostrarSesion.php">Cambio</a>
        
    </body>
</html>
