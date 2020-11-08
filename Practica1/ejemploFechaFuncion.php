
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php

        function fecha($tiempo) {


            $date = date("d", $tiempo);

            $diaSemana = date("N");
            switch ($diaSemana) {
                case 0:
                    $diaSemana = "Domingo, ";
                    break;
                case 1:
                    $diaSemana = "Lunes, ";
                    break;
                case 2:
                    $diaSemana = "Martes, ";
                    break;
                case 3:
                    $diaSemana = "Miércoles, ";
                    break;
                case 4:
                    $diaSemana = "Jueves, ";
                    break;
                case 5:
                    $diaSemana = "Viernes, ";
                    break;
                default:
                    print "Sábado, ";
            }

            $mes = date("n", $tiempo);
            switch (date("n", $tiempo)) {
                case 1:
                    $mes = "Enero";
                    break;
                case 2:
                    $mes = "Febrero";
                    break;
                case 3:
                    $mes = "Marzo";
                    break;
                case 4:
                    $mes = "Abril";
                    break;
                case 5:
                    $mes = "Mayo";
                    break;
                case 6:
                    $mes = "Junio";
                    break;
                case 7:
                    $mes = "Julio";
                    break;
                case 8:
                    $mes = "Agosto";
                    break;
                case 9:
                    $mes = "Septiembre";
                    break;
                case 10:
                    $mes = "Octubre";
                    break;
                case 11:
                    $mes = "Noviembre";
                    break;
                case 12:
                    $mes = "Diciembre";
                    break;
            }

            $anyo = date("Y", $tiempo);

            echo ($diaSemana . $date . " de " . $mes . " de " . $anyo);
        }
        ?>
    </body>
</html>

