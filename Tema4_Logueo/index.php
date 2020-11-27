<?php

if(isset($_COOKIE['intentos']) && ($_COOKIE['intentos']) == 0){
    header('location: intentos.php');
    
}else{
     setcookie("intentos", 3);
}
$bandera = true;

$intentos;

if (isset($_POST['entrar'])) {

    try {
        $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $conex = new PDO('mysql:host=localhost; dbname=logueo; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
        $result = $conex->query("SELECT * from perfil_usuario where nombre='$_POST[nombre]' and pass='" . md5($_POST["pass"]) . "'");

        if ($result->rowCount()) {

            session_start();
            session_name();
            while ($obj = $result->fetch(PDO:: FETCH_OBJ)) {
            $_SESSION['nombre'] = $obj->nombre;
            $_SESSION['apellidos'] = $obj->apellidos;
            $_SESSION['direccion'] = $obj->direccion;
            $_SESSION['localidad'] = $obj->localidad;
            $_SESSION['email'] = $obj->user;
            $_SESSION['pass'] = $obj->pass;
            $_SESSION['color_letra'] = $obj->color_letra;
            $_SESSION['color_fondo'] = $obj->color_fondo;
            $_SESSION['tipo_letra'] = $obj->tipo_letra;
            $_SESSION['tam_letra'] = $obj->tam_letra;
        }
            $_SESSION['nombre'] = $_POST['nombre'];
            header('location: inicio.php');
            
        } else{
           
            $intentos = $_COOKIE["intentos"] -1;
            setcookie("intentos", $intentos);
            $bandera = false;
            
            if($intentos == 0){
                header('location: intentos.php');
            }

        }

        $error = $conex->errorInfo();
    } catch (PDOException $exc) {

        echo $exc->getTraceAsString(); // error de php
        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
    }
}

if(!isset($_POST['entrar']) || $bandera == false){
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
                
                 <?php
                if($bandera == false){
                    ?>
                <span id="incorrecto"><?php if(isset($_COOKIE['intentos'])) echo"Te quedan ".$intentos. " intentos";?></span>
                <?php
                }
                ?>
              
                <form action="" method="post">
                    <label id="login">Nombre</label>
                    <br>
                    <input type="text" name="nombre" value="">

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
    <?php
    
    if(isset($_POST['registrar'])){
        
        header('location: registro.php');
    }
}

?>