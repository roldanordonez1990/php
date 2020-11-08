<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <h2>Modifica los datos de los jugadores</h2>

        <?php
        if (isset($_POST['buscar']) && preg_match('/^[\d]{8}[A-Z]{1}$/', $_POST['dni'])) {

            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');

            if (!$conex->connect_errno) {
                $result = $conex->query("SELECT * from jugadores where dni = '$_POST[dni]'");
            }

            $fila = $result->fetch_object();
            $array = explode(",", $fila->posicion);
            ?>
            <form action="" method="post">
                <?php
                echo "Dni encontrado: " . "<input type='text' name='dni' value= '$_POST[dni]' readonly >";
                echo "</br>";
                echo "</br>";
                echo "Nombre: " . "<input type='text' name='nombre' value='$fila->nombre'>";
                echo "</br>";
                echo "</br>";
                ?>
                Posición: <select multiple="" name="posicion[]">
                    <option value="1" <?php if (in_array("portero", $array)) echo "selected"; ?>>Portero</option>
                    <option value="2" <?php if (in_array("defensa", $array)) echo "selected"; ?>>Defensa</option>
                    <option value="4" <?php if (in_array("centrocampista", $array)) echo "selected"; ?>>Centrocampista</option>
                    <option value="8" <?php if (in_array("delantero", $array)) echo "selected"; ?>>Delantero</option>
                </select>

                <?php
                echo "</br>";       
                echo "</br>";
                ?>
                Dorsal: <select name="dorsal">

                    <?php
                    for ($i = 1; $i <= 11; $i++) {

                        echo " <option value='$i'";
                        if ($fila->dorsal == $i) {
                            echo 'selected';
                        }

                        echo ">" . $i . "</option>";
                    }
                    ?>
                </select>
                <?php
                echo "</br>";
                echo "</br>";
                echo "Equipo: " . "<input type='text' name='equipo' value='$fila->equipo'>";
                echo "</br>";
                echo "</br>";
                echo "Goles: " . "<input type='text' name='goles' value='$fila->goles'>";
                echo "</br>";
                echo "</br>";
                ?>

                <input type="submit" name="guardar" value="Guardar datos">
            </form>
            <br>
            <br>
            <a href="ModificarDatos.php">Volver</a>
            <?php
        } else {
            ?>  

            <form action="" method="post">
                Busca un dni del jugador: <input type="text" name="dni">
                <br>
                <br>
                <input type="submit" name="buscar" value="Buscar">
                <br>

            </form>

            <br>
            <a href="index.php">Volver al incio</a>
            <?php
        }
        ?>

        <?php
        if (isset($_POST['guardar']) && preg_match('/^[A-Z]{1,50}/i', $_POST['nombre']) && preg_match('/^[A-Z]{1,50}/i', $_POST['equipo']) && preg_match('/^\d/', $_POST['goles'])) {

            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');
            $posi = 0;

            $result = $conex->stmt_init();

            foreach ($_POST['posicion'] as $values) {   
                $posi += $values;
            }

            $result->prepare("UPDATE jugadores SET nombre=?, posicion=?, dorsal=?, equipo=?, goles=? where dni= '$_POST[dni]'");
            $result->bind_param('sssss', $_POST['nombre'], $posi, $_POST['dorsal'], $_POST['equipo'], $_POST['goles']);
            $result->execute();
            $result->close();
            echo "Jugador modificado correctamente<br>";
            
        }else if (isset($_POST['guardar']) && !preg_match('/^[A-Z]/i', $_POST['nombre'])) {
                echo "Nombre NO válido";
            }
            
            if (isset($_POST['guardar']) && !preg_match('/^[A-Z]/i', $_POST['equipo'])) {
                echo "Equipo NO válido";
            }
            if (isset($_POST['guardar']) && !preg_match('/^\d/', $_POST['goles'])) {
                echo "Goles NO válido";
            }
        
            
        
        ?>
            
    </body>
</html>

