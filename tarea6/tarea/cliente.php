<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once __DIR__ . '/vendor/autoload.php';
//Especificamos el wsdl que utilizaremos en nuestro servicio web.
$wsdl="http://localhost/tarea6/tarea/server.php?wsdl";
//Instanciamos un cliente nativo de la clase de PHP con el $wsdl especificado anteriormente.
$client=new nusoap_client($wsdl);

echo 'Precio:';
echo $client->call('getPVP', array('codProducto'=>'3DSNG'));
echo "<br>";
echo "Stock:";
$stock = $client->call('getStock',array('codProducto'=>'3DSNG','codTienda'=>'1'));
echo $stock;
echo "<br>";
echo "<br>";
echo "Código de Familias: <br>";
$familias = $client->call('getFamilias',array());
foreach ($familias as $value) {
    echo $value.' <br>';
}
echo 'Codigos por familia:<br>';

$productos = $client->call('getProductosFamilia',array('codFamilia'=>'NETBOK'));

foreach ($productos as $value) {
    echo $value.' <br>';
}