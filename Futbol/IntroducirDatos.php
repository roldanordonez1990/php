<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Introduce Datos para los Jugadores</h2>
        <?php
        if (isset($_POST['enviar']) && preg_match('/^[A-Z]{1,50}/i', $_POST['nombre']) && preg_match('/^[\d]{8}[A-Z]{1}$/', $_POST['dni']) && preg_match('/^[A-Z]{1,50}/i', $_POST['equipo']) && preg_match('/^\d/', $_POST['goles'])) {

            $posi = 0;
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');

            foreach ($_POST['posicion'] as $values) {
                $posi += $values;
            }
            $result = $conex->query("INSERT INTO jugadores (nombre,dni,dorsal,posicion,equipo,goles) VALUES('$_POST[nombre]','$_POST[dni]','$_POST[dorsal]', $posi, '$_POST[equipo]', '$_POST[goles]')");
            ?>
            <p>Jugador añadido correctamente</p>
            <a href="IntroducirDatos.php">Voler al formulario</a>
            <a href="index.php">Voler al inicio</a>
            <?php
        } else {

            require_once './Funciones.php';
            formulario();
            ?>
            <br>
            <a href="index.php">Voler al inicio</a>
            <?php
            if (isset($_POST['enviar']) && !preg_match('/^[A-Z]/i', $_POST['nombre'])) {
                echo "Nombre NO válido";
            }
            if (isset($_POST['enviar']) && !preg_match('/^[\d]{8}[A-Z]{1}$/', $_POST['dni'])) {
                echo "Dni NO válido";
            }
            if (isset($_POST['enviar']) && !preg_match('/^[A-Z]/i', $_POST['equipo'])) {
                echo "Equipo NO válido";
            }
            if (isset($_POST['enviar']) && !preg_match('/^\d/', $_POST['goles'])) {
                echo "Goles NO válido";
            }
        }
        ?>

    </body>
</html>

