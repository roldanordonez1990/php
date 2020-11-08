<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <style>
        h1 {margin-bottom:0;}
        #encabezado {background-color:#ddf0a4;}
        #contenido {background-color:#EEEEEE;height:600px;}
        #pie {background-color:#ddf0a4;color:#ff0000;height:30px;}
    </style>
    <body>
        <div id="encabezado">
            <h1>Ejercicio: Conjuntos de resutados en Mysqli</h1>

            <form action="" method="post">
                Producto: <select name="producto">

                    <?php
                    $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');

                    if (!$conex->connect_error) {

                        $result = $conex->query('SELECT cod, nombre_corto from producto');

                        if ($result) {

                            if ($result->num_rows) {
                                while ($fila = $result->fetch_array()) {

                                    echo '<option value="' . $fila['cod'] . '">' . $fila['nombre_corto'] . '</option>';
                                }
                            }
                        }
                    }
                    ?>

                </select>
                <input type="submit" name="mostrar" value="Mostrar">
            </form>
        </div>
        
        <div id="contenido">
            <h2>Stock del producto en las tiendas:</h2>
            <form action="" method="post">
                <?php
                if (isset($_POST['mostrar'])) {

                    $result = $conex->query('SELECT ti.nombre, sto.unidades, ti.cod from stock as sto JOIN tienda as ti where ti.cod=sto.tienda and sto.producto="' . $_POST['producto'] . '"');

                    if ($result) {

                        while ($fila = $result->fetch_array()) {

                            echo "Tienda: " . $fila['nombre'] . " : <input type='text' name='uni[]' value='$fila[unidades]'>";
                            echo "<input type='hidden' name='producto' value='$_POST[producto]'>";
                            echo "<input type='hidden' name='codTienda[]' value='$fila[cod]'>";
                        }
                        ?>
                        <input type="submit" name="actualizar" value="Actualizar">
                    </form>
            
                    <?php
                }
            }

            if (isset($_POST['actualizar'])) {
                echo 'pero buenooooooooooooo';
                $result2 = $conex->stmt_init();
                $result2->prepare('UPDATE stock SET unidades=? WHERE tienda=? and producto=?');
                $result2->bind_param('sss', $unidades, $tienda, $_POST['producto']);
                for ($i = 0; $i < count($_POST['uni']); $i++) {
                    $unidades = $_POST["uni"][$i];
                    $tienda = $_POST["codigoTienda"][$i];
                    $result2->execute();
                }
                $result2->close();
                $conex->close();
            }
            ?>
            
        </div>
    </body>
</html>
