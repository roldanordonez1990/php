<?php
require_once __DIR__ . '/vendor/autoload.php';
//Especificamos el wsdl que utilizaremos en nuestro servicio web.
$wsdl = "http://localhost/tarea6/tarea/server3.php?wsdl";
//Instanciamos un cliente nativo de la clase de PHP con el $wsdl especificado anteriormente.
$client = new nusoap_client($wsdl);
?>

<html>

    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>
        <h3>Conversor de Euros a Dóllares/Libras</h3>
        <form action="" method="post">
            <label>Elige el tipo de moneda a convertir:</label>
            <select name="monedas">
                <option value="euros">€</option>
                <option value="dollar">$</option>
                <option value="libras">£</option>
            </select>

            <input type="number" name="d" placeholder="Euros..."/>
            <input type="submit" name="convertir" value="Convertir"/>
        </form>
        <br>
         <h3>Conversor de Dóllares/Libras a Euros</h3>
        <form action="" method="post">
            <label>Elige el tipo de moneda para convertir:</label>
            <select name="monedas2">
               
                <option value="dollar">$</option>
                <option value="libras">£</option>
            </select>

            <input type="number" name="d" placeholder="Moneda..."/>
            <input type="submit" name="convertirAeuro" value="Convertir"/>
        </form>
    </body>
</html>

<?php
if (isset($_POST['convertir'])) {

    switch ($_POST['monedas']) {
        case "euros":
            echo $client->call('convertidorEurosADollar', array('euro' => $_POST['d'])) . " Dóllares";
            echo "<br>";
            echo $client->call('convertidorEurosALibras', array('euro' => $_POST['d'])) . " Libras";
            //echo "Euros";
            break;
        case "dollar":
            echo $client->call('convertidorEurosADollar', array('euro' => $_POST['d'])) . " Dóllares";
            //echo "Dóllares";
            break;
        case "libras":
            echo $client->call('convertidorEurosALibras', array('euro' => $_POST['d'])) . " Libras";
            //echo "Libras";
            break;
    }
}

if (isset($_POST['convertirAeuro'])) {

    switch ($_POST['monedas2']) {
        
        case "dollar":
            echo $client->call('convertidorDollarAeuro', array('dollar' => $_POST['d'])) . " Euros";
            //echo "Dóllares";
            break;
        case "libras":
            echo $client->call('convertidorLibrasAeuro', array('libra' => $_POST['d'])) . " Euros";
            //echo "Libras";
            break;
    }
}
?>