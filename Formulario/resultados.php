
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>

        <?php
        echo ($_POST['nombre']."<br/>");
        echo ($_POST['apellidos']."<br/>");
        echo ($_POST['direccion']."<br/>");
        echo ($_POST['tarjeta']);
        ?>
        <form name="input" action="formu1.php" method="post">
        <br/>
        <input type="submit" value="Cancelar" name="cancelar"/>
        <input type="hidden" value="<?php echo $_POST['nombre']?>" name="nombre"/>
        <input type="hidden" value="<?php echo $_POST['apellidos']?>" name="apellidos"/>
        <br/>
        <input type="submit" value="Confirmar" name="confirmar"/>
        
</form>
    </body>
</html>
