<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 6</title>
    </head>
    <body>

        <?php
        //a) estructrua repetir con buble for

        /* $numero = 0;
          $suma = 0;
          for ($i = 1; $i <= 100; $i++) {
          $numero++;
          $suma += $numero;
          echo $numero . "<br>";
          }
          echo "La suma es: " . $suma;
         */

        //b) estructura mientras con while

        /* $numero = 0;
          $suma = 0;

          while($numero < 100){
          $numero++;
          $suma += $numero;
          echo $numero . "<br>";
          }
          echo "La suma es: " . $suma;

         */

        //c) estructura para con do while
        $numero = 0;
        $suma = 0;
        do {
            $numero++;
            $suma += $numero;
            echo $numero . "<br>";
        } while ($numero < 100);
        echo "La suma es: " . $suma;
        ?>  

    </body>
</html>


