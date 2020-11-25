<?php
session_name();
session_start();

// Si no existe variable de sesión nombre, no entre directamente aquí
if (!$_SESSION['nombre']) {
    header('location: login.php');
}
?>

<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: TIENDA-Listado de productos</title>
        <link href="styles.css" rel="stylesheet" type="text/css">
    </head>
    <body class="pagcesta">
        <div id="contenedor">
            <div id="encabezado">
                <h1>Cesta de la compra</h1>
            </div>
            <div id="pagproductos">
                <?php
                
                if(isset($_SESSION['cesta'])){
                $precioTotal = 0;
               
                   foreach ($_SESSION['cesta'] as $key => $values){
                     
                      ?>
                <p><?php echo $values['nombre']."----->".$values['precio']." € "." x ".$values['cantidad']." uds"."<br>"; ?></p>
               
                      <?php 
                        $precioTotal += $values['precio'] * $values['cantidad'];
//                       

                   }
                   
                }

                ?>
                <hr />
                <p><span>Precio total: <?php  echo $precioTotal ?>€</span></p>
                <form action="pagar.php" method="POST">
                    <p><span class="pagar"><input type="submit" name="pagar" value="Pagar"</span></p>
                </form>
            </div>
            <br class="divisor" />
            <div id="pie">
                <form action="logoff.php" method="post">
                    <input type="submit" name="salir" value="Abandonar la sesión">
                </form>

		<p class='error'></p>
                
            </div>
        </div>
        
        
        
    </body>
</head>
</html>
