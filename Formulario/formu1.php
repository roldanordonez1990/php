

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>

        <?php
        if (isset($_POST['enviar'])) {
            ?>
            PEDIDO:
            <br/>
            <form name="input" action="resultados.php" method="post">

                Direccion: <input type="text" name="direccion" value="" />
                <input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?>" />
                
                <br/>
                <br/>
                Numero tarjeta: <input type="text" name="tarjeta" value="" />
                <br/>
                <input type="hidden" name="apellidos" value="<?php echo $_POST['apellidos']; ?>" />
                <input type="submit" value="Enviar" name="enviar"/>
                <?php
            } else {
                ?>
                DATOS:

                <form name="input"  action="" method="post">

                    Nombre: <input type="text" name="nombre" value="<?php if (isset($_POST['cancelar'])) {
                        echo $_POST['nombre'];
                    }
                    ?>" />
                    
             
                    Apellidos: <input type="text" name="apellidos" value="<?php if(isset($_POST['cancelar'])){
                        echo $_POST['apellidos'];
                    }?>" />

                    <br/>
                    <input type="submit" value="Enviar" name="enviar"/>


                    </body>
                    </html>
                    <?php
                }
                ?>

