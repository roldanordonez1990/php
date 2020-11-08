 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>


        <form action="mostrarResultados.php" method="post">

           
            Edad:
            <br/>
            <select name="anyos">
                <option value="Entre 1 y 14 años">Entre 1 y 14 años</option>
                <option value="Entre 15 y 25 años">Entre 15 y 25 años</option>
                <option value="Entre 26 y 35 años">Entre 26 y 35 años</option>
                <option value="mayor de 35">35</option>

                <br/> 
                Estado civil: 
                <input type="radio" name="estado" value="soltero"> soltero 
                <input type="radio" name="estado" value="casado"> casado
                <input type="radio" name="estado" value="otro"> otro<br/>
                <br/>
                
                 <input type="hidden" name="aficion" value=<?php echo json_encode($_POST['aficion']);?>>
                 <input type="hidden" name="nombre" value="<?php echo($_POST['nombre'])?>">
                 <input type="hidden" name="apellidos" value="<?php echo($_POST['apellidos'])?>">
                 <input type="hidden" name="estudios" value=<?php echo json_encode($_POST['estudios']);?>>
                 <input type="hidden" name="genero" value="<?php echo($_POST['genero'])?>">
                 
                 <input type="submit" value="Enviar" name="enviar"/>
                
        </form>

    </body>
</html>