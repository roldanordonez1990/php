<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 9</title>
    </head>
    <body>

        <table border="1">
            <?php
            $estadios_de_futbol = array("Barcelona" => "Camp Nou", "Real Madrid" => "Santiago Bernabeu", "Valencia" => "Mestalla", "Real Sociedad" => "Anoeta");


            foreach ($estadios_de_futbol as $estadio => $valor) {

                echo "<tr>";
                echo ("<td>" . $estadio . "</td>");
                echo ("<td>" . $valor . "</td>");
            }

            echo "</tr>";
            ?>

            <?php
            $estadios_de_futbol = array("Barcelona" => "Camp Nou", "Real Madrid" => "Santiago Bernabeu", "Valencia" => "Mestalla", "Real Sociedad" => "Anoeta");
            unset($estadios_de_futbol['Real Madrid']);

            foreach ($estadios_de_futbol as $estadio => $values) {

                echo "<ul>";
                echo ("<li>" . $estadio . " : " . $values . "</li>");
                echo "</ul>";
            }
            ?>

        </table>
    </body>
</html>


