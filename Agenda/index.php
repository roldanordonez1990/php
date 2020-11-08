
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <style>
        .bajoDch{float:right;position:absolute;margin-bottom:0px;margin-right:0px;bottom:0px; right:0px;}
        .altoDch2 {color: #f00; float:right; position:absolute; margin-right:0px; margin-top:0px; top:0px; right:0px;}
        .altoDch1 {color: #00f; float:right; position:absolute; margin-right:0px; margin-top:0px; top:0px; right:0px;}
    </style>
    <body>
        <h2>Agenda telefónica</h2>

        <?php
        if (isset($_POST['enviar'])) {
            $arrayPersonas = array();

            if (!empty($_POST['cadena'])) {
                $arrayPersonas = json_decode($_POST['cadena'], true);
            }

            if (!empty($_POST['nombre']) && !empty($_POST['numero'])) {

                if (array_key_exists($_POST['nombre'], $arrayPersonas)) {
                    ?>
                    <h3 class="altoDch1">Registro modificado</h3>
                    <?php
                } else {
                    ?>
                    <h3 class="altoDch1">Registro añadido</h3>

                    <?php
                }

                $arrayPersonas[$_POST['nombre']] = $_POST['numero'];
            }



            if (!empty($_POST['nombre']) && empty($_POST['numero'])) {

                if (array_key_exists($_POST['nombre'], $arrayPersonas)) {

                    unset($arrayPersonas[$_POST["nombre"]]);
                    ?>
                    <h3 class="altoDch2">Registro eliminado</h3>
                    <?php
                    echo '<br/>';
                } else {
                    ?>
                    <h3 class="altoDch2">No existe ese registro</h3>
                    <?php
                }
            }
            ?>
            <table border="2">

                <?php
                foreach ($arrayPersonas as $indice => $value) {
                    ?>
                    <tr>
                        <?php
                        echo "<td>" . $indice . "<td>";
                        echo "<td>" . $value . "<td>";
                    }
                    ?>

                </tr>

            </table>
            <?php
        }
        ?>
        <form action="" method="post" class='bajoDch'>

            Nombre: <input type="text" name="nombre" value="">
            <br/>
            Número: <input type="text" name="numero" value="">
            <input type="submit" name="enviar" value="enviar">
            <input type="hidden" name="cadena" value=<?php if (isset($arrayPersonas)) echo json_encode($arrayPersonas) ?>>

        </form>



    </body>
</html>
