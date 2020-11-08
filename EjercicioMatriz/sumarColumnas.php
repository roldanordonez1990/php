<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        if (isset($_POST['enviarColumnas']) && (!empty($_POST['fil'])) && (!empty($_POST['col']))) {
            require_once './matriz.php';
            echo 'la matriz es de' . $_POST['fil'] . "x" . $_POST['col'] . '<br/>';

            $matriz1 = crearRepresentarMatriz($_POST['fil'], $_POST['col']);

            sumarMatrizColumnas($matriz1, $_POST['fil'], $_POST['col']);
        }else{
            ?>
            <form name="form1" action="" method="post">
            Introduce número de filas: <input type="number" name="fil">
            <br/>
            Introduce número de columnas: <input type="number" name="col">
            <br/>
            <input type="submit" name="enviarColumnas" value="Enviar">


        </form>
        <?php
        }
        ?>
        
    </body>
</html>