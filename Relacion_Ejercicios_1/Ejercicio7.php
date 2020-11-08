<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 7</title>
    </head>
    <body>

        <?php
        $numero = 0;
        $cuadrado = 0;
        $suma = 0;

        for ($i = 1; $i <= 100; $i++) {
            $numero++;
            $cuadrado = $numero * $i;
            $suma += $cuadrado;
            echo $cuadrado . "<br>";
        }

        echo "La suma de los cuadrados de los 100 primeros números es: " . $suma;
        ?>  

    </body>
</html>

