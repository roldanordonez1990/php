
<?php

require_once './controller/ControladorJuego.php';
require_once './controller/ControladorCliente.php';
require_once './controller/ControladorAlquiler.php';
session_start();

if(!isset($_SESSION['nombre'])){
    header("Location:index.php");
    }

if (isset($_POST['cerrar'])) {

    if (!$_SESSION['nombre']) {
        header('location: index.php');
    } else {
        setcookie(session_name(), "", time() - 3600, "/");
        session_unset();
        session_destroy();
        header('location: index.php');
    }
}

 if(isset($_POST['alquilar'])){
                                  
    
    $fechaA = date("Y-n-d");
    $fechaD = date("Y-n-d");
    ControladorAlquiler::insertar(null,$_POST['alquilar'], $_SESSION['dni'], $fechaA, null);
    ControladorAlquiler::cambiarAlquilerSI($_POST['alquilar']);
  
                                    
 }

?>
<!DOCTYPE html>
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
           

        <div class="container py-3">
            <div class="ml-3">
                <?php echo "Hola " . $_SESSION['nombre']; ?>
            </div>
            <div class="container">

                <div class="">
                    <form action="" method="post">
                        <input type="submit" name="cerrar" value="Cerrar Sesión">
                    </form>
                </div>
                <a href="" >Listado de Juegos</a> -- <a href="vistaAlquilerJuegos.php" >Listado de Juegos Alquilados</a> -- <a href="vistaNoAlquilados.php" >Listado de Juegos NO Alquilados</a> -- <a href="misJuegosAlquilados.php" >Mis Juegos Alquilados</a>
                 <br>
                 <a href="vistaNuevoJuego.php" >Añadir Juego</a> -- <a href="vistaAdministrarJuegos.php" >Administrar Juegos</a>
                <h4 style="text-align: start">Juegos Disponibles</h4>
                <table class="table table-hover">
                    <thead class="thead bg-success text-white">
                        <tr>
                            <th>Carátula</th>
                            <th>Nombre Juego</th>
                            <th>Nombre Consola</th>
                            <th>Año</th>
                            <th>Precio</th>
                            <th></th>
                           
                        </tr>
                    </thead>

                    <?php
                    try {
                        $conex = new Conexion();

                        $juegos = ControladorJuego::recuperarTodos();

                        foreach ($juegos as $values) {
                            ?>
                            <tr>
                                <td><a href="vistaDescripcionJuego.php?Codigo=<?php echo $values->codigo ?>"> <img src="<?php echo $values->imagen ?>" width="60px" height="70px" <?php if($values->alquilado == 'SI') echo "style='filter: grayscale(100%);'"; ?>/></a>
                                <td><?php echo $values->nombre_juego ?></td>
                                <td><?php echo $values->nombre_consola ?></td>
                                <td><?php echo $values->anno ?></td>
                                <td><?php echo $values->precio ?></td>
                                <td> <form action="" method="post"><button class="visible" type="submit" name="alquilar" value="<?php echo $values->codigo ?>" <?php if($values->alquilado == 'SI') echo "style= 'display: none;'"; ?>>Alquilar</button>  </form> </td>
                            </tr>
                            <?php
                        }
                    } catch (PDOException $exc) {
                        echo $exc->getTraceAsString(); // error de php
                        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
                    }
                    ?>

                </table>
            </div>
        </div>

    </body>
</html>