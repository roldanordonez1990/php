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
        if (isset($_POST['consultar'])) {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'autobuses');

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
                        echo "Fecha:" . " <input type='date' name='fecha' value='$obj->Fecha'>";
                        echo "<input type='hidden' name='fecha' value='$_POST[fecha]'>";
                        echo "<br>";
                        echo "<br>";
                        echo "Origen:" . "<input type ='text' name ='origen' value ='$obj->Origen'>";
                        echo "<input type='hidden' name='origen' value='$_POST[origen]'>";
                        echo "<br>";
                        echo "<br>";
                        echo "Destino:" . "<input type ='text' name ='destino' value ='$obj->Destino' >";
                        echo "<input type='hidden' name='destino' value='$_POST[destino]'>";
                        echo "<br>";
                        echo "<br>";
                        echo "Plazas disponibles:" . "<input type ='text' name ='plazas' value ='$obj->Plazas_libres' >";
                         
                        ?>
                        <input type = "submit" name = "reservar" value = "Reservar">

                    </form>
                    <?php
                }
            }
        } else {
            ?>
            <form action="" method="post"> 

                Fecha: <input type="date" name="fecha" value="">
                <br>
                <br>
                Origen: <input type="text" name="origen" value="">
                <br>
                <br>
                Destino: <input type="text" name="destino" value="">
                <br>
                <br>
                <input type="submit" name="consultar" value="Consultar">

            </form>
    <?php
}
?> 
        
        <?php
        
        if(isset($_POST['reservar'])){
             $conex = new mysqli('localhost', 'dwes', 'abc123.', 'autobuses');
             
             $result = $conex->query("SELECT Plazas_libres from viajes where Fecha = '$_POST[fecha]' and Origen= '$_POST[origen]' and Destino= '$_POST[destino]'");
             $obj = $result->fetch_object();
             $plaza = $obj->Plazas_libres -1;
             
             
             $result = $conex->query("UPDATE viajes SET Plazas_libres = '$plaza' where Fecha= '$_POST[fecha]' and Origen = '$_POST[origen]' and Destino= '$_POST[destino]'");
             echo "Plaza reservada";
        }
        ?>

    </body>
</html>
