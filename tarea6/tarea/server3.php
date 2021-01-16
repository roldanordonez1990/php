<?php

require_once __DIR__ . "/vendor/autoload.php";
$server=new nusoap_server();
$namespace="http://localhost/tarea6/tarea/server3.php";

$server->configureWSDL("Tarea 6 ejercicio 3", $namespace);
$server->wsdl->schemaTargenNamespace=$namespace;

$server->register("convertidorEurosADollar", array("euro"=>"xsd:float"),array("return"=>"xsd:float"),FALSE,FALSE,FALSE,FALSE,"Euros");
$server->register("convertidorEurosALibras", array("euro"=>"xsd:float"),array("return"=>"xsd:float"),FALSE,FALSE,FALSE,FALSE,"Euros");
$server->register("convertidorDollarAeuro", array("dollar"=>"xsd:float"),array("return"=>"xsd:float"),FALSE,FALSE,FALSE,FALSE,"Euros");
$server->register("convertidorLibrasAeuro", array("libra"=>"xsd:float"),array("return"=>"xsd:float"),FALSE,FALSE,FALSE,FALSE,"Euros");


function convertidorEurosADollar($euros){
   
    $cambioAlDollar = 0.828072;
    $cantidad = $euros/$cambioAlDollar;
    
    return $cantidad;
     
}

function convertidorEurosALibras($euros){
   
    $cambioALibra = 1.1247;
    $cantidad = $euros/$cambioALibra;
    
    return $cantidad;
     
}

function convertidorDollarAeuro($dollar){
   
    $cambioAeuro = 0.82807;
    $cantidad = $dollar*$cambioAeuro;
    
    return $cantidad;
     
}

function convertidorLibrasAeuro($libra){
   
    $cambioAeuro = 1.12;
    $cantidad = $libra*$cambioAeuro;
    
    return $cantidad;
     
}

$server->service(file_get_contents("php://input"));
?>

