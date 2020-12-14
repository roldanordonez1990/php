<?php

require_once './controller/ControladorJuego.php';
require_once './controller/ControladorCliente.php';
require_once './controller/ControladorAlquiler.php';
session_start();

if(!isset($_SESSION['nombre'])){
    header("Location:index.php");
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
                <h3>Juegos NO Alquilados en la Aplicación</h3>
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
                   <br>
                      <?php

                       
                        $juegos = ControladorJuego::recuperarNoAlquilados();
                            
                         if($juegos > 0){
                     ?>   
                     
                <h4 style="text-align: start">Juegos Comares</h4>
                <table class="table table-hover">
                    <thead class="thead bg-success text-white">
                        <tr>
                            <th>Carátula</th>
                            <th>Nombre Juego</th>
                            <th>Nombre Consola</th>
                            <th>Año</th>
                            <th>Precio</th>
                            
                        </tr>
                    </thead>

                    <?php

                     foreach($juegos as $values){
                        
                            ?>
                            <tr>
                               <td> <img src="<?php echo $values->imagen ?>" width="60px" height="70px"/></td>
                                <td> <?php echo $values->nombre_juego ?> </td>
                                <td> <?php echo $values->nombre_consola ?> </td>
                                <td> <?php echo $values->anno ?> </td>
                                <td> <?php echo $values->precio ?></td>
                                
                            </tr>
                            <?php
                            }
                       ?>
                </table>
                 <?php
                }else{
                     ?>               
                   <div class="alert alert-warning">
                        <strong>¡Lo sentimos!</strong> Todos los juegos están alquilados
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </body>
</html>