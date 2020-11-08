
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

        function intercambio(&$a, &$b, &$c) {

            $aux = $b;
            $b = $a;
            $a = $c;
            $c = $aux;
        }

        intercambio($a, $b, $c);

        echo $a . ",";
        echo $b . ",";
        echo $c . ",";
        ?>
    </body>
</html>