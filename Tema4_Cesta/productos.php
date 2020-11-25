<?php
session_name();
session_start();

// Si no existe variable de sesión nombre, no entre directamente aquí
if (!$_SESSION['nombre']) {
    header('location: login.php');
}

try {
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
    $result = $conex->query("SELECT * from producto");
    ?>
    <htm>
        <head>
            <link rel="stylesheet" href="styles.css"/>
        </head>
        <body class="pagproductos">
            <div id="contenedor">
                <div id="encabezado">
                    <h1>Listado de productos</h1>
                </div>
                <div id="cesta" >
                    <h3><img src="cestita.png" alt="Cesta" width="24" height="21">Cesta</h3>
                    <hr />
                    <?php
                    if (isset($_POST['añadir'])) {

                        if (isset($_SESSION['cesta'][$_POST['añadir']])) {

                            $cantidad = $_SESSION['cesta'][$_POST['añadir']]['cantidad'];
                            $cantidad++;
                        } else {
                            $cantidad = 1;
                        }
                        $datos = array("nombre" => $_POST['nombreCorto'], "descripcion" => $_POST['descripcion'], "precio" => $_POST['pvp'], "cantidad" => $cantidad);
                        $_SESSION['cesta'][$_POST['añadir']] = $datos;
                    }
                    if (isset($_POST['vaciar'])) {

                        unset($_SESSION['cesta']);
                    }
                    ?>
                    <div id="productos">
                        <label class="pagproductos"><?php
                            if (isset($_SESSION['cesta'])) {
                                foreach ($_SESSION['cesta'] as $key => $values) {
                                    echo $key . " x " . $values['cantidad'] . "<br>";
                                }
                            }
                            ?></label>
                    </div>

                    <br>
                    <form action="" method="post">
                        <input type="submit" name="vaciar" value="Vaciar Cesta" >
                    </form>
                    <form action="cesta.php" method="POST">
                        <input type="submit" name="comprar" value="Comprar" <?php if (empty($_SESSION['cesta'])) echo "disabled" ?>>
                    </form>
                </div>
                <?php
                while ($fila = $result->fetch()) {
                    ?>
                    <form action = "" method = "post">
                        <button type = 'submit' name ='añadir' value ="<?php echo $fila['cod'] ?>" >Añadir</button>
                        <input type = "hidden" name = "descripcion" value = "<?php echo $fila['descripcion'] ?>" >
                        <input name = "nombreCorto" value = "<?php echo $fila['nombre_corto']; ?>"readonly>
                        ==>
                        <input name = "pvp" value = "<?php echo $fila['PVP']; ?>"readonly>

                    </form>
                    <?php
                }
                ?>
                <br class="divisor" />
                <div id="pie">
                    <form action="logoff.php" method="post">
                        <input type="submit" name="salir" value="Abandonar la sesión">
                    </form>

                    <p class='error'></p>

                </div>
            </div>

        </body>

    </htm>
    <?php
    $error = $conex->errorInfo();
} catch (PDOException $exc) {

    echo $exc->getTraceAsString(); // error de php
    echo 'Error:' . $exc->getMessage(); // error del servidor de bd
}
?>