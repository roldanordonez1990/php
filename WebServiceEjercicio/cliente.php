<?php

require_once __DIR__ . '/vendor/autoload.php';
//Especificamos el wsdl que utilizaremos en nuestro servicio web.
$wsdl="http://localhost/WebServiceEjercicio/server.php?wsdl";
//Instanciamos un cliente nativo de la clase de PHP con el $wsdl especificado anteriormente.
$client=new nusoap_client($wsdl);

$pvp=$client->call('getPVP', array('cod'=>'3DSNG'));
echo $pvp;
?>

