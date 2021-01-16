<?php
require_once "funciones.php";
require_once __DIR__ . "/vendor/autoload.php";
$server=new nusoap_server();
$namespace="http://localhost/tarea6/tarea/server.php";

$server->configureWSDL("Tarea 6", $namespace);
$server->wsdl->schemaTargenNamespace=$namespace;

$server->register("getPVP", array("codigo"=>"xsd:string"),array("return"=>"xsd:int"),FALSE,FALSE,FALSE,FALSE,"getPVP");
$server->register("getStock", array("codigo"=>"xsd:string", "tienda"=>"xsd:int"),array("return"=>"xsd:int"),FALSE,FALSE,FALSE,FALSE,"getStock");
$server->register("getFamilias", array(), array("return"=>"xsd:Array"),FALSE,FALSE,FALSE,FALSE,"getFamilias");
$server->register("getProductosFamilia", array("familia"=>"xsd:string"), array("return"=>"xsd:Array"),FALSE,FALSE,FALSE,FALSE,"getProductosFamilia");



$server->service(file_get_contents("php://input"));
?>

