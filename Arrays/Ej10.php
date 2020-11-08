
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 10</title>
    </head>
    <body>

        <table  border="1">
            <?php
            $numeros = array(3, 2, 8, 123, 5, 1);
            print_r($numeros);
            echo "<br>";
            sort($numeros);
            print_r($numeros);

            foreach ($numeros as $numero => $value) {

                echo "<tr>";
                echo ("<td>" . $value . "</td>");
            }
            echo "</tr>";
            ?>
        </table> 

    </body>
</html>
