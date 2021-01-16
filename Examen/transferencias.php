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


        
            <div class="container">
             <?php echo "Hola " . $_SESSION['nombre']; ?>
                <div class="">
                    <form action="" method="post">
                        <input type="submit" name="cerrar" value="Cerrar Sesión">
                    </form>
                </div>

            <div>
               
                    <h3>TRAMITAR TRANSFERENCIA</h3>
          
                    <?php $cuenta = ControladorTransferencia::buscarCuenta($_POST['iban']); ?>
                    <form action="vistaTransferenciaHecha.php" method="post">
                   Origen: <input type="text" name="iban" value="<?php echo $cuenta->iban ?>" readonly=""/>
                    <br>
                    <br>
                   Saldo: <input type="text" name="saldo" value="<?php echo $cuenta->saldo ?>" readonly=""/>
                    <br>
                    <br>
                    <?php 
                    
                    $cuentas = ControladorCuentas::recuperarTodasCuentas();
                    ?>
                    Cuentas: <select name="destino">
                        
                        <?php
                        foreach ($cuentas as $values) {
                                echo '<option value="' . $values->iban . '" ';
                               
                                echo ">" . $values->iban . '</option>';
                            }
                            ?>
                            
                    </select>
                    <br>
                    <br>
                    Cantidad: <input type="number" name="cantidad" value=""/>
                    <br>
                    <br>
                    <button class="visible" type="submit" name="tranferir" value="">Transferir</button>
                    </form>
                   
            </div>

        </div>

    </body>
</html>



