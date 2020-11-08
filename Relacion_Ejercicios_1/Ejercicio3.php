
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>
        
        <?php
        $a = 33;
        $b = 232;
        $c = 1334;

        if ($a > $b && $a > $c) {
            echo('El número mayor es ' . $a);
        } else if ($b > $a && $b > $c) {
            echo('El número mayor es ' . $b);
        } else{
            echo('El número mayor es ' . $c);
        }
        ?>
    </body>
</html>