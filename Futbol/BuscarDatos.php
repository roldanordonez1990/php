<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <h2>Buscar datos de un jugador particular</h2>

        <?php
        if (isset($_POST['consultar'])) {

            $posicion = $_POST['dato'];
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');

            if (!$conex->connect_errno) {
                $result = $conex->query("SELECT * FROM jugadores where $posicion LIKE '%$_POST[buscar]%'");

                while ($fila = $result->fetch_object()) {
                    echo "Dni: " . $fila->dni . "<br>";
                    echo "Nombre: " . $fila->nombre . "<br>";
                    echo "Dorsal: " . $fila->dorsal . "<br>";
                    echo "Posición: " . $fila->posicion . "<br>";
                    echo "Equipo: " . $fila->equipo . "<br>";
                    echo "Goles: " . $fila->goles . "<br><br>";
                }
            }
            ?>
            <br>
            
            <a href="index.php">Volver al incio</a>
            <?php
        } else {
            ?>
            <form action="" method="post">
                Selecciona un dato del jugador: <select name="dato">

                    <option value="dni">Dni</option>
                    <option value="equipo">Equipo</option>
                    <option value="posicion">Posición</option>

                </select>

                <br>
                <br>
                Busca por dato seleccionado: <input type="text" name="buscar">

                <br>
                <br>
                <input type="submit" name="consultar" value="Consultar datos">
            </form>
            <br>
            <br>
            <a href="index.php">Volver al inicio</a>

            <?php
        }
        ?>

    </body>


</html>

