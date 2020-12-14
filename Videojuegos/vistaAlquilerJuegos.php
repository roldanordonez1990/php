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
                <h3>Juegos Alquilados en la Aplicación</h3>
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

                       
                        $juegos = ControladorAlquiler::recuperarTodosConCliente();
                            
                         if($juegos->rowCount()){
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
                             <th>Persona que lo posee</th>
                            <th></th>
                        </tr>
                    </thead>

                    <?php

                     
                       
                     while($row = $juegos->fetchObject()){
                        
                            ?>
                            <tr>
                               <td> <img src="<?php echo $row->Imagen ?>" width="60px" height="70px"/></td>
                                <td> <?php echo $row->Nombre_juego ?> </td>
                                <td> <?php echo $row->Nombre_consola ?> </td>
                                <td> <?php echo $row->Anno ?> </td>
                                <td> <?php echo $row->Precio ?></td>
                                <td> <?php echo $row->Nombre ?></td>
                            </tr>
                            <?php
                            }
                       ?>
                </table>
                
                 <?php
                }else{
                     ?>               
                   <div class="alert alert-warning">
                        <strong>¡Lo sentimos!</strong> No existe ningún juego alquilado en este momento
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </body>
</html>