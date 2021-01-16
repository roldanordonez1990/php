<?php

require_once './controller/ControladorCliente.php';

if(isset($_COOKIE['intentos']) && ($_COOKIE['intentos']) == 0){
    header('location: index.php');
    
}else{
     
     setcookie("intentos", 3);
}
$bandera = true;

$intentos;
if (isset($_POST['entrar']) && isset($_POST['dni']) && isset($_POST['pass'])) {
    
    $cliente = ControladorCliente::buscarClientePorDniYPassword($_POST['dni'], $_POST['pass']);
    //compruebo que hay coincidencias y que existe el usuario en la bbdd
    if($cliente != null){
         session_start();
          if($cliente->nombre == "Administrador"){
              $_SESSION['nombre'] = $cliente->nombre;
              $_SESSION['dni'] = $cliente->dni;
              header("location:inicio.php");
         }else{ 
              $_SESSION['nombre'] = $cliente->nombre;
              $_SESSION['dni'] = $cliente->dni;
             
              header("location:inicio.php");
         }
    }else{
         $intentos = $_COOKIE["intentos"] -1;
            setcookie("intentos", $intentos);
            controladorCliente::modificarIntentos($intentos, $_SESSION['dni']);
            $bandera = false;
            
            if($bandera == false){
               ?>
 <span id="incorrecto"><?php if(isset($_COOKIE['intentos'])) echo"Te quedan ".$intentos. " intentos";?></span>
<?php
             
            }
            if($intentos == 0){
                ?>
 <sapn>Usuario Bloqueado</sapn>
 <?php
            }
    }
}

?>
 <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
            <link rel="stylesheet" href="styles.css"/>
        </head>
        <body>
            <div id="login">
            <fieldset id="login" class=>
 
                <legend id="login">Login</legend>
                
                <form action="" method="post">
                    <label id="login">DNI</label>
                    <br>
                    <input type="text" name="dni" value="">

                    <br>
                    <br> <label id="login">Password</label>
                    <br>
                    <input type="password" name="pass" value="">
                    <br>
                    <br>
                    <input id="login" type="submit" name="entrar" value="Entrar">
                    <br>
                    <br>
                    <input id="login" type="submit" name="registrar" value="Registrar">
                </form>

            </fieldset>
            </div>
        </body>
    </html>
  
    
   
