<?php
session_name();
session_start();
if (isset($_COOKIE['intentos']) && $_COOKIE['intentos'] == 3) {
   ?>
<html>
    <head>
        <style>
        
        body{
            background-color: <?php echo $_SESSION['color_fondo']?>;
            color: <?php echo $_SESSION['color_letra']?>;
            font-family: <?php echo $_SESSION['tipo_letra']?>;
             font-size: <?php echo $_SESSION['tam_letra'] ?>;
        }
    </style>
    </head>
    
    <body>
        <h3>Hola <?php echo $_SESSION['nombre']?></h3>
        <br>
        <br>
        <h2>Sus datos son:</h2>
        <br>
        <br>
        <p>Su nombre es: <?php echo $_SESSION['nombre']?></p>
        <br>
        <p>Su apellido es: <?php echo $_SESSION['apellidos']?></p>
        <br>
        <p>Su dirección es: <?php echo $_SESSION['direccion']?></p>
        <br>
        <p>Su localidad es: <?php echo $_SESSION['localidad']?></p>
        <br>
        <br>
        <a href="index.php">Salir</a>
        <br>
        <a href="inicio.php">Volver</a>
    </body>
</html>
<?php
} else {
    header('location: index.php');
}
?>
