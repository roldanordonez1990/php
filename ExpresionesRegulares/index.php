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
        <h2>Formulario de validación</h2>

        <?php
        if (isset($_POST['aceptar']) && (!empty($_POST['nombre'])) && (!empty($_POST['dni'])) && (!empty($_POST['fecha'])) && (!empty($_POST['edad']))) {

            if (preg_match('/^[A-Z]{1,10}$/i', $_POST['nombre'])) {

                echo 'correcto nombre' . '<br>';
                echo ($_POST['nombre'] . '<br>');
            } else {
                echo 'incorrecto nombre';
            }
            if (preg_match('/^[\d]{8}[A-Z]{1}$/', $_POST['dni'])) {

                echo 'correcto dni' . '<br>';
                echo ($_POST['dni'] . '<br>');
            } else {
                echo 'incorrecto dni';
            }
            if (preg_match('/^[\d]{2}\-[\d]{2}\-[\d]{4}/', $_POST['fecha'])) {

                echo 'correcto fecha' . '<br>';
                echo ($_POST['fecha'] . '<br>');
            } else {
                echo 'incorrecto fecha';
            }
            if (preg_match('/^[\d]+/', $_POST['edad']) && $_POST['edad'] >= 18) {

                echo 'correcto edad' . '<br>';
                echo ($_POST['edad'] . '<br>');
            } else {
                echo 'incorrecto edad';
            }
        } else {
            ?>

            <form name="" action="" method="post">
                Nombre: <input type="text" name="nombre">
                <br>
                DNI: <input type="text" name="dni">
                <br>
                Fecha: <input type="text" name="fecha">
                <br>
                Edad: <input type="text" name="edad">
                <br>
                <input type="submit" name="aceptar" value="Aceptar">

            </form>
            <?php
        }
        ?>




    </body>
</html>
