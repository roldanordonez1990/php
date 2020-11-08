<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 7</title>
    </head>
    <body>

        <?php
        $a = 122;
        $b = 13;
        $c = 1308;

        $mayor;
        $intermedio;
        $menor;

        if ($a > $b && $a > $c && $b > $c) {

            $mayor = $a;
            $intermedio = $b;
            $menor = $c;
        } else if ($b > $a && $b > $c && $a > $c) {
            $mayor = $b;
            $intermedio = $a;
            $menor = $c;
        } else if ($c > $a && $c > $b && $a > $b) {
            $mayor = $c;
            $intermedio = $a;
            $menor = $b;
        } else if ($c > $a && $c > $b && $b > $a) {
            $mayor = $c;
            $intermedio = $b;
            $menor = $a;
        } else if ($a > $b && $a > $c && $c > $b) {

            $mayor = $a;
            $intermedio = $c;
            $menor = $b;
        } else if ($b > $a && $b > $c && $c > $a) {
            $mayor = $b;
            $intermedio = $c;
            $menor = $a;
        }
        echo "orden: " . $mayor . "," . $intermedio . "," . $menor;
        ?>  

    </body>
</html>

