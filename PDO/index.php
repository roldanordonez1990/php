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
        
        // Si todo sale bien va a devolver un 1
        try {

            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $dwes = new PDO('mysql:host=localhost; dbname=futbol; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
            $registro = $dwes->exec("UPDATE jugadores SET goles=0 WHERE dni='60986122H'");
            echo $registro;

            $error = $dwes->errorInfo();
            echo $error[2];
            
        } catch (PDOException $exc) {

            echo $exc->getTraceAsString(); //error de php
            echo "Error: " . $exc->getMessage(); //error del servidor de la bbdd
        }
        ?>
    </body>
</html>
