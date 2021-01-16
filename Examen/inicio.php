<?php
require_once './model/Cliente.php';
require_once './controller/ControladorCuentas.php';
require_once './controller/ControladorTransferencia.php';
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
                
             
                <h4 style="text-align: start">MIS CUENTAS</h4>
                <table class="table table-hover">
                    <thead class="thead bg-success text-white">
                        <tr>
                            <th>Cuentas</th>
                            <th>Saldo</th>
                            <th>Historial</th>
                            <th>Tranferencia</th>
                         
                        </tr>
                    </thead>

                    <?php
                  
                    try {
                     

                      $cuentas = ControladorCuentas::recuperarTodos($_SESSION['dni']);

                        foreach ($cuentas as $values) {
                           
                            ?>
                  
                            <tr>
                              
                                <td><?php echo $values->iban ?></td>
                                <td><?php echo $values->saldo ?></td>
                               
                                <td> <form action="" method="post"><button class="visible" type="submit" name="historial" value="<?php echo $values->iban?>">Historial</button>  </form> </td>
                                <td> <form action="transferencias.php" method="post"><button class="visible" type="submit" name="iban" value="<?php echo $values->iban?>">Transferencia</button>  </form> </td>

                            </tr> 
                           
                            <?php
                            
                        }
                        
                       
                    } catch (PDOException $exc) {
                        echo $exc->getTraceAsString(); // error de php
                        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
                    }
                    ?>

                </table>
                
            
                 <h4 style="text-align: start">HISTORIAL</h4>
                <table class="table table-hover">
                    <thead class="thead bg-success text-white">
                        <tr>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Fecha</th>
                            <th>Cantidad</th>
                         
                        </tr>
                    </thead>
                    <?php
                     try {
                     
                      if(isset($_POST['historial'])){
                      $cuentas1 = ControladorTransferencia::recuperarTransferenciasCliente($_POST['historial']);
                      
                        while ($row = $cuentas1->fetchObject()) {
                           
                            ?>
                  
                            <tr>
                              
                                <td><?php echo $row->iban_origen ?></td>
                                <td><?php echo $row->iban_destino ?></td>
                                <td><?php echo $row->fecha ?></td>
                                <td><?php echo $row->cantidad ?></td>
                               

                            </tr> 
                           
                            <?php
                        }
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

