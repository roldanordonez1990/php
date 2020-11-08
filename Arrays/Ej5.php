<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <table border="1">
        <?php
        $persona1 = array("Nombre" => "Pedro Torres", "Dirección" => "C/Mayor, 37", "Teléfono" => 123456789);
        $persona2 = array("Nombre" => "Nuria Reyes", "Dirección" => "C/Cotton, 24", "Teléfono" => 123453249);
        $persona = array($persona1, $persona2);

        foreach ($persona as $key => $value) {
            echo"<tr>";
            foreach ($value as $llave => $valores) {
                echo("<td>".$valores ."</td>");
            }
            
            echo"</tr>";
        }
        ?>
            
        </table>
    </body>
</html>

