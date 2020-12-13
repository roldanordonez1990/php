<?php
require_once './controller/ControladorJuego.php';
require_once './controller/ControladorCliente.php';
require_once './controller/ControladorAlquiler.php';
session_start();

if(isset($_POST['añadir'])){
    
    $juego->nuevoJuego($result."-".$_POST['consola'],$_POST['nombre'],$_POST['consola'],$_POST['año'],$_POST['precio'],'NO','imagenes/'.$_POST['foto'],$_POST['descripcion']);
    ControladorJuego::insertar($juego);
    
     if(is_uploaded_file($_FILES['foto']['tmp_name'])){
        // para hacer el nombre único le vamos a concatenar el tiempo UNY
        $fich_unic=$_FILES['foto']['name']."-".time();
        $ruta="imagenes/".$fich_unic;
        //para copiar el fichero en la carpeta usamos la funciçon move_uploaded_file
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
        // para poner la imagen en la base de datos
        $conex = new Conexion();
        $conex->query("INSERT INTO juegos (Imagen) values('$ruta')");
        echo $conex->error;
        $conex->close();
    }else{
        echo 'ERROR al cargar la imagen';
    }
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
                     
                     <h3>Añadir Nuevo Juego</h3>
                     <form  class="form-vertical" action="" method="post">
                         <div class="form-group">
                             
                         Nombre: <input class="form-control" type="text" name="nombre">
                         <br>
                         Consola: <input class="form-control" type="text" name="consola">
                         <br>
                         Año: <input class="form-control" type="number" name="año">
                         <br>
                         Precio: <input class="form-control" type="number" name="precio">
                         <br>
                         Descripción: <textarea class="form-control" name="descripcion">Escribe una descripción</textarea>
                         <br>
                         Imagen: <input  type="file" name="foto">
                         <br>
                         <br>
                         <input type="submit" name="añadir" value="Añadir">
                         
                         </div>
                     </form>
            </div>

        </div>

    </body>
</html>
