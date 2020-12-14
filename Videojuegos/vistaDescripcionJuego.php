<?php
require_once './controller/ControladorJuego.php';
require_once './controller/ControladorCliente.php';
require_once './controller/ControladorAlquiler.php';
session_start();

if(!isset($_SESSION['nombre'])){
    header("Location:index.php");
    }

if (isset($_POST['alquilar'])) {

    $fechaA = date("Y-n-d");
    $fechaD = date("Y-n-d");
    ControladorAlquiler::insertar(null, $_POST['alquilar'], $_SESSION['dni'], $fechaA, null);
    ControladorAlquiler::cambiarAlquilerSI($_POST['alquilar']);
}
?>


<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Insert title here</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </head>
    <body>


        <div class="ml-5 mt-4">

            <div class="row">
                <div class="col-md-4">
                       <?php if($_SESSION['nombre'] == "Admin"){
                    ?>
                <a href="vistaAdministrador.php">Volver</a>
                     <?php
                }else{
                   ?>
                     <a href="vistaLogueo.php">Volver</a>
                     <?php
                }
            ?>
                    <?php $juego = ControladorJuego::buscarJuego($_GET['Codigo']); ?>

                    <h3><?php echo $juego->nombre_juego ?></h3>
                    <p><?php echo "<b>Consola:</b> " . $juego->nombre_consola ?></p>
                    <p><?php echo "<b>Año:</b> " . $juego->anno ?></p>
                    <p><?php echo "<b>Precio:</b> " . $juego->precio ?></p>
                    <p><?php echo "<b>Descripción:</b> " . $juego->descripcion ?></p>
                    <form action="" method="post"><button class="visible" type="submit" name="alquilar" value="<?php echo $juego->codigo ?>" <?php if($juego->alquilado == 'SI')  echo "style= 'display: none;'"; ?>>Alquilar</button>  </form>
                </div>
                <div class="col-md-4">
                    <img src="<?php echo $juego->imagen ?>">
                </div>
            </div>

        </div>

    </body>
</html>
