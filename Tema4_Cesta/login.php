<?php
$bandera = true;
if (isset($_POST['enviar'])) {
    try {
        $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $conex = new PDO('mysql:host=localhost; dbname=formcookie; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
        $result = $conex->query("SELECT * from datos where nombre='$_POST[nombre]' and password='" . md5($_POST["pass"]) . "'");
        
        if ($result->rowCount()) {

            session_start();
            session_name();
            $_SESSION['nombre'] = $_POST['nombre'];
            header('location: productos.php');
            
        } else {
            header('location: login.php');
            $bandera = false;
           
        }

        $error = $conex->errorInfo();
    } catch (PDOException $exc) {

        echo $exc->getTraceAsString(); // error de php
        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
    }
}else{
    
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
                <span>Usiario incorrecto</span>
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
                    <label id="login">Recordar</label>
                    <input type="checkbox" name="recordar" value="<?php if (isset($_COOKIE['chekeo'])) echo $_COOKIE['chekeo']; ?>">
                    <br>
                    <br>
                    <input id="login" type="submit" name="enviar" value="Enviar">

                </form>

            </fieldset>
            </div>
        </body>
    </html>
    
    <?php
}

    
?>
