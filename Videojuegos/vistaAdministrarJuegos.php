
<?php

require_once './controller/ControladorJuego.php';
require_once './controller/ControladorCliente.php';
require_once './controller/ControladorAlquiler.php';
session_start();


if(isset($_POST['borrar'])){
    
  
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
                
                <h4 style="text-align: start">Gestiona los Juegos</h4>
                <table class="table table-hover">
                    <thead class="thead bg-success text-white">
                        <tr>
                            <th>Carátula</th>
                            <th>Nombre Juego</th>
                            <th>Nombre Consola</th>
                            <th>Año</th>
                            <th>Precio</th>
                            <th></th>
                            <th></th>
                           
                        </tr>
                    </thead>

                    <?php
                    try {
                        $conex = new Conexion();

                        $juegos = ControladorJuego::recuperarNoAlquilados();

                        foreach ($juegos as $values) {
                            ?>
                            <tr>
                                <td> <img src="<?php echo $values->imagen ?>" width="60px" height="70px"/></td>
                                <td><?php echo $values->nombre_juego ?></td>
                                <td><?php echo $values->nombre_consola ?></td>
                                <td><?php echo $values->anno ?></td>
                                <td><?php echo $values->precio ?></td>
                                <td> <form  action="" method="post"><button class="btn btn-info" class="visible" type="button" name="editar" value="<?php echo $values->codigo ?>">Editar</button>  </form> </td>
                                <td> <form  action="" method="post"><button class="btn btn-danger" class="visible" type="button" name="borrar" value="<?php echo $values->codigo ?>">Borrar</button>  </form> </td>

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