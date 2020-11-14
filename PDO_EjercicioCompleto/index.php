<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Plantilla para Ejercicios Tema 3</title>
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>
    <style>
        h1 {margin-bottom:0;}
        #encabezado {background-color:#ddf0a4;}
        #contenido {background-color:#EEEEEE;height:600px;}
        #pie {background-color:#ddf0a4;color:#ff0000;height:30px;}

    </style>
    <body>

        <div id="encabezado">
            <h1>Ejercicio: </h1>
            <form action="" method="post">
                <?php
                try {

                    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                    $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
                    $error = $conex->errorInfo();
                    $result = $conex->query('SELECT cod from familia');
                    ?>
                    Productos: <select name="productos">
                        <?php
                        while ($fila = $result->fetch()) {

                            echo '<option value="' . $fila['cod'] . '">' . $fila['cod'] . '</option>';
                        }
                        ?>
                    </select>

                    <?php
                } catch (PDOException $exc) {
                    echo $exc->getTraceAsString(); // error de php
                    echo 'Error:' . $exc->getMessage(); // error del servidor de bd
                }
                ?>
                <input type="submit" name="mostrar" value="Mostrar">
            </form>
        </div>

        <div id="contenido">
            <h2>Contenido</h2>

            <?php
            if (isset($_POST["mostrar"]) && !empty($_POST['productos'])) {

                try {

                    $result = $conex->query("SELECT * from producto where familia ='$_POST[productos]' ");

                    while ($fila = $result->fetch()) {
                        ?>

                        <form action="Editar.php" method="post">
                            <input type="hidden" name="cod" value="<?php echo $fila['cod'] ?>">
                            <input type="hidden" name="nombre_corto" value="<?php echo $fila['nombre_corto'] ?>">
                            <input type="hidden" name="nombre" value="<?php echo $fila['nombre'] ?>">
                            <input type="hidden" name="descripcion" value="<?php echo $fila['descripcion'] ?>">
                            <input type="hidden" name="PVP" value="<?php echo $fila['PVP'] ?>">
                            <?php
                            echo "Prodcuto: " . $fila['nombre_corto'] . " -->" . $fila['PVP'] . " € " . "<input type='submit' name='enviar' value='Enviar'>";
                            ?>

                        </form>
                        <?php
                    }
                
                } catch (PDOException $exc) {
                    echo $exc->getTraceAsString(); // error de php
                    echo 'Error:' . $exc->getMessage(); // error del servidor de bd
                }
            }
                ?>


        </div>

        <div id = "pie">
        </div>
    </body>
</html>
