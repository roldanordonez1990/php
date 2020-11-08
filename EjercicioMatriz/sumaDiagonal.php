<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        if (isset($_POST['enviarDiagonal']) && (!empty($_POST['fil'])) && (!empty($_POST['col']))) {
            require_once './matriz.php';
            echo 'la matriz es de' . $_POST['fil'] . "x" . $_POST['col'] . '<br/>';

            $matriz1 = crearRepresentarMatriz($_POST['fil'], $_POST['col']);

            sumarMatrizDiagonal($matriz1, $_POST['fil'], $_POST['col']);
        } else {
            ?>
            <form name="form1" action="" method="post">
                Introduce número de filas: <input type="number" name="fil">
                <br/>
                Introduce número de columnas: <input type="number" name="col">
                <br/>
                <input type="submit" name="enviarDiagonal" value="Enviar">


            </form>
            <?php
        }
        ?>

    </body>
</html>