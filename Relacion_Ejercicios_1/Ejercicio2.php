<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio2</title>
    </head>
    <body>
        <table border="4">
            <?php
            $numero = rand(0, 50);
            
            if($numero % 2 == 0){
                
                $numero += 1;
                
            }

            for ($i = 0; $i < 10; $i++) {
                echo "<tr>";

                for ($j = 0; $j < 10; $j++) {
                    echo "<td>".$numero."</td>";
                    
                    $numero +=2;
                }
            }
            echo "</tr>";
            ?>

        </table>
    </body>
</html>
