<?php
echo "Hola " . $_COOKIE['nombreUsuario'] . " ,su última visita fue:" . $_COOKIE['ultimoAcceso'];
?>
<html>
    <head></head>
    <body>
        <form action="CookiesFormulario.php" method="post">

            <input type="submit" name="volver" value="Volver">
        </form>
    </body>
</html>

