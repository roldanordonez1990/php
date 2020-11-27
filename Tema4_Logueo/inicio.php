<?php
session_name();
session_start();

if(isset($_POST['salir'])){
    setcookie(session_name(), "", time()-3600, "/");
    session_unset();
    session_destroy();
    header('location: index.php');
}

if(isset($_POST['ver'])){
     header('location: datos.php');
}

if (isset($_COOKIE['intentos']) && $_COOKIE['intentos'] == 3) {
    ?>
    <html>
        <head>
            <style>

                body{
                    background-color: <?php echo $_SESSION['color_fondo'] ?>;
                    color: <?php echo $_SESSION['color_letra'] ?>;
                    font-family: <?php echo $_SESSION['tipo_letra'] ?>;
                    font-size: <?php echo $_SESSION['tam_letra'] ?>;
                }
            </style>
        </head>

        <body>
            <h3>Hola <?php echo $_SESSION['nombre'] ?></h3>
            <br>
            <br>
            <h1>Bienvenido a nuestra web</h1>
            <br>

            <form action="" method="post">
                <input type="submit" name="salir" value="Salir">
            </form>
            <br>

            <form action="" method="post">
                <input type="submit" name="ver" value="Ver datos">
            </form>

        </body>
    </html>
    <?php
} else {
    header('location: index.php');
}
?>
