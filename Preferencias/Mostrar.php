<?php
session_start();

if(isset($_POST['borrar'])){
    setcookie(session_name(), "", time()-3600, "/");
    session_unset();
    session_destroy();
    
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 1</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <fieldset>
            <legend>Preferencias</legend>
            <form action="" method="post">
            <div class="campo">
                <label class="etiqueta">Idioma:</label>
                <br>
                <label class="texto"><?php if (isset($_SESSION['idioma'])) echo $_SESSION['idioma'] ?></label>
            </div>
            <br>
            <div class="campo">
                <label class="etiqueta">Perfil público:</label>
                <br>
                <label class="texto"><?php if (isset($_SESSION['perfil'])) echo $_SESSION['perfil'] ?></label>
            </div>
            <br>
            <div class="campo">
                <label class="etiqueta">Zona horaria:</label>
                <br>
                <label class="texto"><?php if (isset($_SESSION['zona'])) echo $_SESSION['zona'] ?></label>
            </div>
            <br>
            <input class="borrado" type="submit" name="borrar" value="Borrar preferencias">
             <br>
             
             <a href="Preferencias.php">Establecer preferencias</a>
            </form>
        </fieldset>
    </body>
</html>
