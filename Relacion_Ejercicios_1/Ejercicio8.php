<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 7</title>
    </head>
    <body>

        <?php
        $numero = 0;
        $suma = 0;
        for ($i = 1; $i <= 100; $i++) {

            $numero++;

            if ($numero % 2 == 0) {
                $suma += $numero;
                echo $numero . "<br>";
            }
        }

        echo "La suma es: " . $suma;
        ?>  

    </body>
</html>



