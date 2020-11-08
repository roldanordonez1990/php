<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 1</title>
    </head>
    <body>
        <?php
        //echo "Hola a todos madafakas";
        $numeroAno = 5;

        if ($numeroAno % 4 == 0) {


            if ($numeroAno % 100 == 0) {


                if ($numeroAno % 400 == 0) {

                    echo("SI es bisiesto");
                    
                } else {
                    
                    echo("NO es bisiesto");
                }
            }
        } else {

            echo("NO es bisiesto");
        }
        ?>
    </body>
</html>