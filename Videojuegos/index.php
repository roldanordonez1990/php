<?php
require_once './controller/ControladorJuego.php';
require_once './controller/ControladorCliente.php';

if (isset($_POST['entrar']) && isset($_POST['dni']) && isset($_POST['pass'])) {
    
    $cliente = ControladorCliente::buscarClientePorDniYPassword($_POST['dni'], $_POST['pass']);
    //compruebo que hay coincidencias y que existe el usuario en la bbdd
    if($cliente != null){
         session_start();
         if($cliente->nombre == "Admin"){
              $_SESSION['nombre'] = $cliente->nombre;
              $_SESSION['dni'] = $cliente->dni;
              header("location:vistaAdministrador.php");
         }else{
              $_SESSION['nombre'] = $cliente->nombre;
              $_SESSION['dni'] = $cliente->dni;
              header("location:vistaLogueo.php");
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
            <div class="ml-3 mb-3">

                <form action="" method="post">
                    DNI: <input type="text" name="dni" placeholder="DNI...">
                    Password: <input type="password" name="pass" placeholder="password">
                    <input type="submit" name="entrar" value="Login">
                </form>
            </div>
            <div class="container">
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
                    try {
                        $conex = new Conexion();

                        $juegos = ControladorJuego::recuperarTodos();

                        foreach ($juegos as $values) {
                            ?>
                            <tr>
                                <td> <img src="<?php echo $values->imagen ?>" width="60px" height="70px"/></td>
                                <td><?php echo $values->nombre_juego ?></td>
                                <td><?php echo $values->nombre_consola ?></td>
                                <td><?php echo $values->anno ?></td>
                                <td><?php echo $values->precio ?></td>
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