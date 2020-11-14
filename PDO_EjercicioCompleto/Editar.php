<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
        <style>
            h1 {margin-bottom:0;}
            #encabezado {background-color:#ddf0a4;}
        </style>
    </head>
    <body>
        <div id="encabezado">
            <h2>Edita tu producto</h2>
            <form action="Actualizar.php" method="post">
                <?php
                echo "Código: " . "<input type='text' name='cod' value='$_POST[cod] 'readonly >";
                echo "</br>";
                echo "</br>";
                echo " Nombre corto: " . "<input type = 'text' name = 'nombre_corto' value = ' $_POST[nombre_corto]' >";
                echo "</br>";
                echo "</br>";

                echo " Nombre: " . "<input type = 'text' name = 'nombre' value = ' $_POST[nombre]' >";
                echo "</br>";
                echo "</br>";


                echo "Descripción: " . "<textarea name = 'descripcion' value= '$_POST[descripcion]'>.'$_POST[descripcion]'.</textarea>";
                echo "</br>";
                echo "</br>";
                echo " PVP: " . "<input type = 'text' name ='PVP' value = ' $_POST[PVP]' >";
                ?>
                <br>
                <br>





                <input type="submit" name="actualizar" value="Actualizar">
            </form>
            <form action="index.php" method="post">
                <input type="submit" name="cancelar" value="Cancelar">
            </form>
        </div>



    </body>
</html>

