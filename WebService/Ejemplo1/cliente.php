<?php

require_once __DIR__ . '/vendor/autoload.php';
//Especificamos el wsdl que utilizaremos en nuestro servicio web.
$wsdl="http://localhost/WebService/Ejemplo1/server.php?wsdl";
//Instanciamos un cliente nativo de la clase de PHP con el $wsdl especificado anteriormente.
$client=new nusoap_client($wsdl);
//Realizamos la llamada al servicio web con Call
//Donde el primer parametro es la accion que llamara, y el segundo los parametros esperados por el web service
$respuestaSaludar=$client->call('Saludar',array('nombre'=>"Antonio"));
echo $respuestaSaludar;
$respuestaSuma = $client->call('Suma', array('a' => '8','b' => '8'));
echo $respuestaSuma;
$respuestaObtenerDatos=$client->call('ObtenerDatos',array('dni'=>"12345678L"));
print_r($respuestaObtenerDatos);

$pvp=$client->call('getPVP', array('cod'=>'3DSNG'));
echo $pvp;
?>

