<?php
require_once '../controller/ControladorUsuario.php';

$correcto = true;
if (isset($_POST['enviar']) && isset($_POST['nombre']) && isset($_POST['pass'])) {
    $usuario = ControladorUsuario::buscarUsuarioPorNombreYPassword($_POST['nombre'], $_POST['pass']);
    //compruebo que hay coincidencias y que existe el usuario en la bbdd
    if(empty($errores) && $usuario != null){
         session_start();
         $_SESSION['nombre'] = $usuario;
          header("location:vistaCesta.php");
    }


} if (!isset($_POST['enviar']) || $correcto == false) {
    ?>
    <html>
        <head>
            <title>Login</title>
            <link rel="stylesheet" type="text/css" href="styles.css" media="screen" />
        </head>
        <body>
            <div id="login">

                <form action="" method="post">
                    <fieldset>
                        <legend id="login">Login</legend>
                        <?php
                        if ($correcto == false) {
                            ?>
                            <span class="mensaje">El usuario no existe</span>
                            <?php
                        }
                        ?>
                        <div class="campo">
                            <label for='usuario'>Nombre</label><br/>
                            <input id="usuario" type="text" name="nombre" value="" ><br><!-- comment/ -->
                        </div>


                        <div class="campo">
                            <label for='password' >Contraseña</label><br>
                            <input id="password" type="password" name="pass" value="" ><br>  
                        </div>
                        <div class="campo">
                            <input type="submit" value="Enviar" name="enviar">    
                        </div>
                    </fieldset>
                </form>
            </div>

            <?php
        }
        ?>

    </body>
</html>