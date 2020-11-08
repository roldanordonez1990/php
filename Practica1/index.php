<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // phpinfo();
        echo "Hola Mundo" . "<br>";
        //$date_default_timezone_set = date_default_timezone_set('Europe/Madrid');


        $date = date("d");

        $date1 = date("N");
        switch ($date1) {
            case 0:
                $date1 = "Domingo, ";
                break;
            case 1:
                $date1 = "Lunes, ";
                break;
            case 2:
                $date1 = "Martes, ";
                break;
            case 3:
                $date1 = "Miércoles, ";
                break;
            case 4:
                $date1 = "Jueves, ";
                break;
            case 5:
                $date1 = "Viernes, ";
                break;
            default:
                print "Sábado, ";
        }

        $date2 = date("z");
        switch ($date2) {
            case 279:
                $date2 = "Octubre";
        }

        $date3 = date("Y");

        echo($date1 . $date . " de " . $date2 . " de " . $date3);
        ?>


    </body>
</html>
