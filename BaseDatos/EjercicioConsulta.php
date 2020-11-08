
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 1</title>
    </head>
    <style>
        h1 {margin-bottom:0;}
        #encabezado {background-color:#ddf0a4;}
        #contenido {background-color:#EEEEEE;height:600px;}
        #pie {background-color:#ddf0a4;color:#ff0000;height:30px;}
    </style>

    <body>
        <div id="encabezado">
            <h1>Conjunto de resultados en Mysqli</h1>
            <form action="" method="post">
                Producto: <select name="nombre_corto">

                    <?php
                    $conexion = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');

                    if (!$conexion->connect_errno) {

                        //$conexion->autocommit(false);

                        $result = $conexion->query('SELECT cod, nombre_corto from producto');

                        if (!$conexion->errno) {
                            if ($result->num_rows) {

                                while ($fila = $result->fetch_array()) {

                                    echo '<option value="' . $fila['cod'] . '">' . $fila['nombre_corto'] . '</option>';
                                }
                            }
                        } else {
                            echo 'No se ha podido hacer la conexión';
                        }
                    }
                    ?>

                </select>

                <input type="submit" name="enviar" value="mostrar">
            </form>
        </div>

        <div id="contenido">
            <?php
            if (!empty($_POST['nombre_corto'])) {

                $producto = $_POST['nombre_corto'];

                $result = $conexion->query('SELECT ti.nombre, sto.unidades from tienda as ti JOIN stock as sto where ti.cod=sto.tienda and sto.producto="' . $_POST['nombre_corto'] . '"');

                if (!$conexion->errno) {
                    if ($result->num_rows) {

                        while ($fila = $result->fetch_array()) {
                            echo 'Tienda: ' . $fila['nombre'] . ':' . $fila['unidades'] . ' unidades<br/>';
                        }
                    }
                }
            }
            ?>

        </div>
    </body>
</html>
