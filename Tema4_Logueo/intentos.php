<?php
session_name();
session_start();

if(isset($_COOKIE['intentos']) && $_COOKIE['intentos'] == 0){
    ?>

    <html>
        <head>
            <meta charset="UTF-8">
            <title>Ejercicio 3</title>
        </head>
        <body>
            <h1>HAS AGOTADO EL NÚMERO DE INTENTOS</h1>
            <br>
            <h2>Cierrra el navegador</h2>
        </body>
    </html>
    
    <?php
    
}else{
    header('location: index.php');
    
}
   ?>
    
   