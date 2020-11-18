
<?php
if (isset($_POST['enviar'])) {

    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];
    $fecha = date('d-m-y h:i:s');
    $check = $_POST['recordar'];

    setcookie('nombreUsuario', $nombre);
    setcookie('passUsuario', $pass);
    setcookie("ultimoAcceso", $fecha);
    
    if(isset($_POST['recordar']))
    setcookie("chekeo", "checked");
    
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
   
    $result = $conex->query("SELECT * from datos");
    $obj = $result->fetch();

    if ($_POST['nombre'] == $obj['nombre'] && md5($_POST['pass']) === $obj['password']) {
        header('Location: GuardaCookies.php');
    } else {

        header('Location: CookiesFormulario.php');
    }
} else {
    ?>


    <form action="" method="post">

        Nombre: <input type="text" name="nombre" value="<?php if (isset($_POST['volver']) && isset($_COOKIE['chekeo'])) {
              
            echo $_COOKIE['nombreUsuario'];
            
    } else {
        echo "";
    }
    ?>" >


        <br>
        <br>
        Password: <input type="password" name="pass" value="<?php if (isset($_POST['volver']) && isset($_COOKIE['chekeo'])) {
             
            echo $_COOKIE['passUsuario'];
            
        } else {
            echo "";
        }
        ?>" >

        <br>
        Recordarme: <input type="checkbox" name="recordar" value="<?php if (isset($_COOKIE['chekeo'])) echo $_COOKIE['chekeo']; ?>">
        <br>
        <br>
        <input type="submit" name="enviar" value="Enviar">

    </form>
        <?php
     }
        

