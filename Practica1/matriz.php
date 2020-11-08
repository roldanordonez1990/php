<html>
    <head>
        <meta charset="UTF-8">
        <title>Matriz</title>
    </head>
    <body>

        <?php
        $matriz["fila1"]["col1"] = 1;
        $matriz["fila1"]["col2"] = 2;
        $matriz["fila1"]["col3"] = 3;
        $matriz["fila2"]["col1"] = 4;
        $matriz["fila2"]["col2"] = 5;
        $matriz["fila2"]["col3"] = 6;
        $matriz["fila3"]["col1"] = 7;
        $matriz["fila3"]["col2"] = 8;
        $matriz["fila3"]["col3"] = 9;



        echo "<table border=1>";

        foreach ($matriz as $indfila => $fila) {
            echo "<tr>";
            foreach ($fila as $indcol => $value) {
                echo "<td>".$value."</td>";
                // echo $indfila;
            }
            echo "</tr>";
        }

        echo "</table>";
        ?>
    </body>
</html>
