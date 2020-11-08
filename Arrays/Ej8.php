<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>



        <?php
        $numero = array();
        $contador = 0;
        $sumaPares = 0;
        $media;



        for ($i = 0; $i <= 10; $i++) {

            $numero [] = $i;

            if ($i % 2 == 0) {
                $contador ++;
                $sumaPares += $i;
                //echo $numero[$indice];
                $media = $sumaPares/$contador;
            }else {
                echo ($numero[$i]);
                
            }

            
        }
         echo ("<br>");
         echo ("La suma de los pares es: ".$sumaPares);
         echo ("<br>");
         echo ("La media de los pares es: ".$media);
        ?>


    </body>
</html>

