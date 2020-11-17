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
    <body>      //feo
        <?php
        $numero = array();
        $min = 0;
        $max = 50;


        $numero = array();
        $contador = 0;

        do {

            $aleatorio = random_int($min, $max);

            if ($aleatorio % 2 == 0) {
                $numero [] = ($aleatorio);
                $contador++;
                echo($aleatorio . "<br>");
            }
        } while ($contador < 10);
        ?>
    </body>
</html>
