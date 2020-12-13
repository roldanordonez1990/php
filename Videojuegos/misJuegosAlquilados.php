<?php

require_once './controller/ControladorJuego.php';
require_once './controller/ControladorCliente.php';
require_once './controller/ControladorAlquiler.php';
session_start();

if(isset($_POST['devolver'])){
    
    ControladorAlquiler::cambiarAlquilerNO($_POST['devolver']);
    controladorAlquiler::eliminarAlquiler($_POST['devolver']);
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
                <h3>Mis Juegos Alquilados</h3>
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
                <h4 style="text-align: start">Juegos Comares</h4>
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

                       
                            $juegos = ControladorJuego::recuperarAlquiladosUsuario($_SESSION['dni']);
                            while($row = $juegos->fetchObject()){
                        
                            ?>
                            <tr>
                               <td> <img src="<?php echo $row->Imagen ?>" width="60px" height="70px"/></td>
                                <td> <?php echo $row->Nombre_juego ?> </td>
                                <td> <?php echo $row->Nombre_consola ?> </td>
                                <td> <?php echo $row->Anno ?> </td>
                                <td> <?php echo $row->Precio ?></td>
                                <td> <form action="" method="post"> <button type="submit" name="devolver" value="<?php echo $row->Codigo?>">Devolver</button> </form></td>
                            </tr>
                            
                            <?php
                            }
                        
                   ?>
                </table>
            </div>
        </div>

    </body>
</html>