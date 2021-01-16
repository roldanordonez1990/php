
<htm>

    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>
        <form action="" method="post">
            <label>Comprueba tu número de la <strong>lotería del Niño:</strong></label>
            <input type="text" name="nino"/>
            <input type="submit" name="comprobarnino" value="Comprobar">
        </form>
        <?php
        if (isset($_POST['comprobarnino'])) {
            $server = file_get_contents("https://api.elpais.com/ws/LoteriaNinoPremiados?n=".$_POST['nino']);

            $resultado = str_replace("busqueda=","",$server);
            $premio = json_decode($resultado);
            
            echo "Su premio es de: ". $premio->premio. " Euros";
               
        }
        ?>
        
        <form action="" method="post">
            <label>Comprueba tu número de la <strong>lotería de Navidad:</strong></label>
            <input type="text" name="navidad"/>
            <input type="submit" name="comprobaNavidad" value="Comprobar">
        </form>
        <?php
        if (isset($_POST['comprobaNavidad'])) {
            $server = file_get_contents("https://api.elpais.com/ws/LoteriaNavidadPremiados?n=".$_POST['navidad']);

            $resultado = str_replace("busqueda=","",$server);
            $premio = json_decode($resultado);
            
            echo "Su premio es de: ". $premio->premio. " Euros";
               
        }
        ?>
    </body>
</html>
