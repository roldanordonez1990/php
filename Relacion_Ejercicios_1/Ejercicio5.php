<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 5</title>
    </head>
    <body>
        <table border="6"> 
            <?php
            $numero = 1;
            $filas = 0;


            while ($filas < 5) {
                echo "<tr></tr>";
                $columnas = 0;

                while ($columnas < 7) {
                    echo "<td>" . $numero . "</td>";
                    $columnas++;
                    $numero++;
                }
                $filas++;
            }
            ?>  
        </table>
    </body>
</html>
