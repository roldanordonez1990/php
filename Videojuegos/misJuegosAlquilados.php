<?php

require_once './controller/ControladorJuego.php';
require_once './controller/ControladorCliente.php';
require_once './controller/ControladorAlquiler.php';
session_start();

if(!isset($_SESSION['nombre'])){
    header("Location:index.php");
    }

if(isset($_POST['devolver'])){
    
    ControladorAlquiler::cambiarAlquilerNO($_POST['devolver']);
    ControladorAlquiler::fechaDevolucion($_POST['devolver']);
    //controladorAlquiler::eliminarAlquiler($_POST['devolver']);
    $dias;
    $diferencia;
    $fechas = ControladorAlquiler::calculoFechas($_POST['id'], $_POST['devolver']);

        while($row = $fechas->fetchObject()){
            $fecha1= $row->Fecha_alquiler;
            $fecha2 = $row->Fecha_devol;  
//            echo "Fecha Alquiler: ".$row->Fecha_alquiler;
//            echo "<br>";
//            echo "Fecha Devolución: ".$row->Fecha_devol;
            echo "<br>";
            $fechaActual = date_create($fecha1);
            $fechadevol = date_create($fecha2);
          $dias = date_diff($fechaActual, $fechadevol);
          $diferencia = '%a';
          ?>
          
              <?php
         $d = $dias->format($diferencia);
          ?>
          
          <?php
         
         
      
    }
    
    $pago = ControladorAlquiler:: pagoCliente($_POST['id']);
    
    while($row = $pago->fetchObject()){
        $pagar = $row->Precio;
    
      if($diferencia > 7){
          
      $total = $pagar + ($diferencia - 7);   
      //echo "Tienes que pagar: ". $total;
      ?>
                    <div class="alert alert-danger">
                       Tienes que pagar <strong><?php echo $total?></strong>
                    </div>
        <?php
      
      }else{
      ?>
                    <div class="alert alert-success">
                        Han pasado <strong><?php echo $d?></strong> días. Tienes que pagar <strong><?php echo $pagar ."€"?></strong>
                    </div>

            <?php
      }
    }
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
                     <br>
                      <?php

                       
                        $juegos = ControladorJuego::recuperarAlquiladosUsuario($_SESSION['dni']);
                            
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
                                        <td> <form action="" method="post"> 
                                                <input type="hidden" name="id" value="<?php echo $row->id?>"/>
                                                <button type="submit" name="devolver" value="<?php echo $row->Codigo?>">Devolver</button> 
                                            </form></td>
                                    </tr>

                            <?php
                            }
                   ?>
                </table>
                <?php
                }else{
                     ?>               
                   <div class="alert alert-warning">
                        <strong>¡Lo sentimos!</strong> No existen juegos alquilados de este usuario
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </body>
</html>