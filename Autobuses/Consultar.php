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
        <h3>Autobuses</h3>

        <?php
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'autobuses');
        if (isset($_POST['consultar'])) {
            

            if ($conex->connect_errno) {
                echo "Error en la conexión";
            } else {
                $result = $conex->query("SELECT Fecha, Origen, Destino, Plazas_libres from viajes where Fecha = '$_POST[fecha]' and Origen= '$_POST[origen]' and Destino= '$_POST[destino]'");

                if ($conex->errno) {
                    echo "Error en la consulta";
                    
                } else {
                    $obj = $result->fetch_object();
                    ?> 
                    <form action="" method="post"> 
                        <?php
                        echo "Fecha:" . " <input type='date' name='fecha' value='$obj->Fecha' readonly>";

                        echo "<br>";
                        echo "<br>";
                        echo "Origen:" . "<input type ='text' name ='origen' value ='$obj->Origen' readonly>";

                        echo "<br>";
                        echo "<br>";
                        echo "Destino:" . "<input type ='text' name ='destino' value ='$obj->Destino' readonly >";

                        echo "<br>";
                        echo "<br>";
                        echo "Plazas disponibles:" . "<input type ='text' name ='plazas' value ='$obj->Plazas_libres' readonly >";
                        echo "<br>";
                        echo "<br>";
                        echo "Reservar más de una plaza" . "<input type='int' name='billetes'>";
                        echo "<input type = 'submit' name = 'reservar' value = 'Reservar'>";
                        ?>


                    </form>
                    <br>
                    <br>
                    <a href="">Volver</a>
                    <?php
                }
            }
        } else {
            ?>
            <form action="" method="post"> 

                Fecha: <input type="date" name="fecha" value="">
                <br>
                <br>
                Origen: <select name="origen">

                    <option value="Madrid">Madrid</option>
                    <option value="Malaga">Malaga</option>
                    <option value="Cordoba">Córdoba</option>
                    

                </select>
                <br>
                <br>
                Destino:  <select name="destino">

                   
                    <option value="Malaga">Malaga</option>
                    <option value="Sevilla">Sevilla</option>
                    <option value="Barcelona">Barcelona</option>
                    <option value="Huelva">Huelva</option>

                </select>
                <br>
                <br>
                <input type="submit" name="consultar" value="Consultar">

            </form>
            <?php
        }
        ?> 
        <?php
        if (isset($_POST['reservar'])) {

            $maximoPlazas = $_POST['plazas'];

            if ($_POST['plazas'] > 0 && $_POST['billetes'] <= $maximoPlazas) {

                $plaza = $_POST['plazas'] - $_POST['billetes'];

                $result = $conex->query("UPDATE viajes SET Plazas_libres = $plaza where Fecha= '$_POST[fecha]' and Origen = '$_POST[origen]' and Destino= '$_POST[destino]'");

                echo "Plaza reservada";
            } else {

                echo "No hay plazas disponibles";
            }
        }
        ?>



    </body>
</html>