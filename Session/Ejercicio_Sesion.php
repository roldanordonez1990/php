
<?php
if (isset($_POST['enviar'])) {

    $tiempoCookie = 3600;
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];
    $fecha = date('d-m-y h:i:s');
    
     session_name($_POST['nombre']);
     session_start();
    setcookie('nombreUsuario', $nombre, time()+$tiempoCookie);
    setcookie('passUsuario', $pass,  time()+$tiempoCookie);
    setcookie("ultimoAcceso", $fecha,  time()+$tiempoCookie);

    if (isset($_POST['recordar']))
        setcookie("chekeo", "checked",  time()+$tiempoCookie);
}
?>

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




if (isset($_POST['enviar']) && (!empty($_POST['nombre'])) && (!empty($_POST['pass']))) {
 
    $result = $conex->query("SELECT * from datos where nombre='$_POST[nombre]' and password='".md5($_POST["pass"])."'");

       if(isset($_SESSION['visitas'])){
            echo "Hola " . session_name(); 
            echo "<br>";
        
          $_SESSION['visitas']++; 
          echo "Visita número: ".$_SESSION['visitas'];      
          
                    
       }else{
           echo "Bienvenido a nuestra página";
          $_SESSION['visitas'] = 0; 
       }
       
        //header('Location: Guarda_Sesion.php');
        
        ?>
<html>
    <head></head>
    <body>
        <form action="" method="post">
            <input type="submit" name="volver" value="Volver">
        </form>
    </body>
</html>
<?php

} else {
    ?>


    <form action="" method="post">

        Nombre: <input type="text" name="nombre" value="<?php if (isset($_POST['volver']) && isset($_COOKIE['chekeo'])) {

        echo $_COOKIE['nombreUsuario'];
    }
           
    
    ?>" >


        <br>
        <br>
        Password: <input type="password" name="pass" value="<?php if (isset($_POST['volver']) && isset($_COOKIE['chekeo'])) {

        echo $_COOKIE['passUsuario'];
    }
            
    
    ?>" >

        <br>
        Recordarme: <input type="checkbox" name="recordar" value="<?php if (isset($_COOKIE['chekeo'])) echo $_COOKIE['chekeo']; ?>">
        <br>
        <br>
        <input type="submit" name="enviar" value="Enviar">

    </form>
    <?php
    
    if(isset($_POST['volver']) && (!isset($_COOKIE['chekeo']))){
    setcookie('nombreUsuario',  $_COOKIE['nombreUsuario'], time()-3600);
    setcookie('passUsuario',  $_COOKIE['passUsuario'],  time()-3600);
    setcookie("ultimoAcceso",  $_COOKIE['ultimoAcceso'],  time()-3600);
    }
}
        

