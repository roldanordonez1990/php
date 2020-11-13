
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
                <?php
                try {

                    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
                    $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
                    $error = $conex->errorInfo();
                    $result = $conex->query('SELECT cod, nombre_corto from producto');
                    ?>
                    Producto: <select name="nombre_corto">
                        <?php
                        while ($fila = $result->fetch()) {

                            echo '<option value="' . $fila['cod'] . '">' . $fila['nombre_corto'] . '</option>';
                        }
                        ?>
                    </select>

                    <?php
                } catch (PDOException $exc) {
                    echo $exc->getTraceAsString(); // error de php
                    echo 'Error:' . $exc->getMessage(); // error del servidor de bd
                }
                ?>
                <input type="submit" name="enviar" value="mostrar">
            </form>
        </div>


        <div id="contenido">
            <h1>Stock del producto en tiendas</h1>

            <form action ="" method ="post">
                <?php
                if (isset($_POST["enviar"]) && !empty($_POST['nombre_corto'])) {

                    $result = $conex->query('SELECT ti.nombre, ti.cod, sto.unidades from tienda as ti JOIN stock as sto where sto.tienda=ti.cod and sto.producto="' . $_POST['nombre_corto'] . '"');

                    //$producto = $_POST['producto'];


                    while ($fila = $result->fetch()) {
                        echo "Tienda: " . $fila['nombre'] . " : <input type='text' name='uni[]' value='$fila[unidades]'>" . "<br>";

                        echo "<input type='hidden' name='producto' value='$_POST[nombre_corto]'>";
                        echo "<input type ='hidden' name ='codigoTienda[]' value ='$fila[cod]'>";
                    }
                    ?>

                    <input type="submit" name="actualizar" value="Actualizar">
                </form>
                <?php
            }
            ?>
            <?php
            if (isset($_POST['actualizar'])) {

                $producto = $_POST["producto"];

                $result = $conex->prepare('UPDATE stock SET unidades=? WHERE tienda=? and producto=?');
                for ($i = 0; $i < count($_POST['uni']); $i++) {
                    $unidades = $_POST["uni"][$i];
                    $tienda = $_POST["codigoTienda"][$i];
                    $result->bindParam(1, $unidades);
                    $result->bindParam(2, $tienda);
                    $result->bindParam(3, $producto);

                    $result->execute();
                }


                $result = null;
            }
            ?>
        </div>
    </body>
</html>
