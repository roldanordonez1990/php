<?php
require_once './model/Cliente.php';
require_once './model/Transferencia.php';
require_once './model/Cuenta.php';
require_once './controller/ControladorCuentas.php';
require_once './controller/ControladorTransferencia.php';
session_start();


if(isset($_POST['confirmar'])){
      $fecha = date("Y-n-d h:i:s");
      $transferencia = new Transferencia();
       $transferencia->nuevaTransferencia($_POST['origen'], $_POST['destino'], $fecha, $_POST['cantidad']);
       ControladorTransferencia::insertar($transferencia);
       ControladorTransferencia::modificarSaldosOrigen($_POST['saldop'], $_POST['origen']);
      $cuentaDestino = ControladorTransferencia::buscarCuenta($_POST['destino']);
      $saldo = $cuentaDestino->saldo;
      $cantidadTransferida = $_POST['cantidad'];
      $sumaSaldo = $saldo + $cantidadTransferida;
      ControladorTransferencia::modificarSaldosDestino($sumaSaldo, $cuentaDestino->iban);
      header('location: inicio.php');
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
                <?php 
                if(isset($_POST['cantidad']) && isset($_POST['saldo'])){
                    $cantidad = $_POST['cantidad'];
                    $comision = $cantidad/100;
                    $saldo = $_POST['saldo'];
                    $saldoPost = ($saldo - $cantidad)-$comision;
                }
                
               
                ?>
     <h3>¿QUIERES CONFIRMAR LA TRANSFERENCIA?</h3>
                  
                    <form  class="form-vertical" action="" method="post">
                        <div class="form-group">

                            Origen: <input class="form-control" type="text" name="origen" value="<?php echo $_POST['iban'] ?>" readonly="">
                            <br>
                            Destino: <input class="form-control" type="text" name="destino" value="<?php echo $_POST['destino'] ?>" readonly="">
                            <br>
                            Cantidad: <input class="form-control" type="number" name="cantidad" value="<?php echo $_POST['cantidad'] ?>" readonly="">
                            <br>
                            Comisión: <input class="form-control" type="number" name="comision" value="<?php echo $comision ?>" readonly="">
                            <br>
                            Saldo Anterior: <input class="form-control" type="number" name="saldoa" value="<?php echo $_POST['saldo'] ?>" readonly="">
                            <br>
                            Saldo Posterior: <input class="form-control" type="number" name="saldop" value="<?php echo $saldoPost ?>" <?php if($saldoPost <= $saldo) echo "style= 'color: red;'"?>>
                   
                            <br>
                            <br>
                            <input type="submit" name="confirmar" value="Confirmar" <?php if($saldoPost <= $saldo)echo "disabled = true;'";?>>

                        </div>
                    </form>
     <form action="inicio.php" method="post">
         <input type="submit" name="volver" value="Volver">
     </form>
                </div>

            </div>

    </body>
</html>
