<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $numero = array();
        $min = 0;
        $max = 50;


        //$numero = array();
        $contador = 0;

        do {

            $aleatorio = random_int($min, $max);

            if ($aleatorio % 2 == 0) {
                $numero [] = $aleatorio;
                $contador++;
                echo($aleatorio . "<br>");
            }
        } while ($contador < 10);

        echo"<br>";
        print_r(array_reverse($numero));
        ?>
    </body>
</html>

