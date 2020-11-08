<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <h2>Datos mostrados de los jugadores</h2>
        <?php
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');

        if (!$conex->connect_errno) {

            $result = $conex->query('SELECT * from jugadores');

            while ($obj = $result->fetch_object()) {
                echo "Nombre: " . $obj->nombre . "<br>";
                echo "Dni: " . $obj->dni . "<br>";
                echo "Dorsal: " . $obj->dorsal . "<br>";
                echo "Posicion: " . $obj->posicion . "<br>";
                echo "Equipo: " . $obj->equipo . "<br>";
                echo "Goles: " . $obj->goles . "<br><br>";
            }
        }
        ?>
        <br>
        <a href="index.php">Volver al incio</a>
    </body>
</html>
