<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>
        <h2>Formulario de acceso</h2>
        
          <?php
        try {

            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            $conex = new PDO('mysql:host=localhost; dbname=formcookie; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
            $error = $conex->errorInfo();
 
            
        } catch (PDOException $exc) {

            echo $exc->getTraceAsString(); // error de php
            echo 'Error:' . $exc->getMessage(); // error del servidor de bd
        }
       

      
        
        if (isset($_POST['enviar']) && (!empty($_POST['nombre'])) && (!empty($_POST['pass'])) && (isset($_POST['recordar']))) {
            echo "ola";
            $result = $conex->query("SELECT * from datos");
            $obj = $result->fetch();
            if($_POST['nombre'] == $obj['nombre'] && md5($_POST['pass']) === $obj['password']){
                echo "Correcto";
            }else{
                echo "Incrorrecto";
            }
        }else{
             ?>

        
        <form action="GuardaCookies.php" method="post">
               
                 Nombre: <input type="text" name="nombre" value="<?php if(isset($_POST['volver'])){
                     echo $_COOKIE['nombreUsuario'];
                }
               
                ?>" />
                
               
                <br>
                <br>
                Password: <input type="password" name="pass" value="<?php if(isset($_POST['volver'])){
                     echo $_COOKIE['passUsuario'];
                }
               
                ?>" />

                <br>
                Recordarme: <input type="checkbox" name="recordar" value="">
                <br>
                <br>
                <input type="submit" name="enviar" value="Enviar">

            </form>
        <?php
        }
        
        ?>
    </body>
</html>

