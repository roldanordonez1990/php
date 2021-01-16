<?php
require_once __DIR__ . '/vendor/autoload.php';
//Especificamos el wsdl que utilizaremos en nuestro servicio web.
$wsdl = "http://localhost/tarea6/tarea/server4.php?wsdl";
//Instanciamos un cliente nativo de la clase de PHP con el $wsdl especificado anteriormente.

$client = new nusoap_client($wsdl);

$manoFinal = $client->call('mano', array('cantidad' =>3));

print_r($manoFinal);
?>

