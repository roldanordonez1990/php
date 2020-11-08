<?php


function formulario(){
    ?>
     <form action="" method="post">

                Nombre: <input type="text" name="nombre">
                <br>
                <br>

                Dni: <input type="text" name="dni">
                <br>
                <br>
                Dorsal: <select name="dorsal">

                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>

                </select>
                <br>
                <br>
                Posición <select multiple="" name="posicion[]">

                    <option value="1">Portero</option>
                    <option value="2">Defensa</option>
                    <option value="4">Centrocampista</option>
                    <option value="8">Delantero</option>


                </select>
                <br>
                <br>
                Equipo: <input type="text" name="equipo">
                <br>
                <br>

                Goles: <input type="text" name="goles">

                <input type="submit" name="enviar" value="Añadir">

            </form>
   <?php
}

?>

<?php

function consulta($conex){
   $conex = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');
}
?>
