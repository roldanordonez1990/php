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
        <h2>Almacenar Datos con Select Múltiple</h2>
        <form action="" method="post">

            Nombre: <input type="text" name="nombre">
            <br>
            Apellidos: <input type="text" name="apellidos">
            <br>
            <br>

            <select multiple="" name="idiomas[]">

                <option value="1">Castellano</option>
                <option value="2">Inglés</option>
                <option value="4">Alemán</option>
                <option value="8">Chino</option>


            </select>
            <br>
            <br>
            <input type="submit" name="enviar" value="Enviar"><input type="submit" name="recuperar" value="Recuperar">
            
        </form>

        <?php
        if (isset($_POST['enviar'])) {
            $idiom = 0;
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
            
            foreach ($_POST['idiomas'] as $values) {
                $idiom += $values;
            }
            $result = $conex->query("INSERT INTO usuarios (nombre,apellidos,idiomas) VALUES('$_POST[nombre]','$_POST[apellidos]', $idiom)");
        }
        
        if(isset($_POST['recuperar'])){
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
            $result = $conex->query('SELECT * FROM usuarios');
            
            while($obj = $result->fetch_object()){
                
                echo "Nombre: ".$obj->nombre."<br>";
                echo "Apellidos: ".$obj->apellidos."<br>";
                echo "Idiomas: ".$obj->idiomas."<br>";
            }
            
            
        }
        ?>
    </body>
</html>
