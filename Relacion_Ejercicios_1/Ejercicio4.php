<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 4</title>
    </head>
    <body>
        <table border="3"> 
            <?php
            $numero = 1;
            for ($i = 0; $i < 5; $i++) {
                echo "<tr></tr>";

                for ($j = 0; $j < 7; $j++) {
                    echo "<td>" . $numero . "</td>";

                    $numero += 1;
                }
            }
            ?>  
        </table>
    </body>
</html>

