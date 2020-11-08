<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        if (isset($_POST['enviarFilas']) && (!empty($_POST['fil'])) && (!empty($_POST['col']))) {
            require_once './matriz.php';
            echo 'la matriz es de' . $_POST['fil'] . "x" . $_POST['col'] . '<br/>';

            //La función devuelve una matriz, por lo que tengo que guardarla en una variable
            $matriz1 = crearRepresentarMatriz($_POST['fil'], $_POST['col']);

            $array = sumarMatrizFilas($matriz1, $_POST['fil'], $_POST['col']);
            //por si lo quiero recorrer. Ya que la función devuelve un array, entonces tengo que guardarla en una variable
            foreach ($array as $key => $value){
            print_r($value." ,");               
            }
        }else{
            ?>
        <form name="form1" action="" method="post">
            Introduce número de filas: <input type="number" name="fil">
            <br/>
            Introduce número de columnas: <input type="number" name="col">
            <br/>
            <input type="submit" name="enviarFilas" value="Enviar">


        </form>
        <?php
        }
        ?>
    </body>
</html>