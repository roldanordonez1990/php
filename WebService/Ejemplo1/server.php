<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once './conn/Conexion.php';
$server=new nusoap_server();
$namespace="http://localhost/WebService/Ejemplo1/server.php";

$server->configureWSDL("Ejemplo 1 Servicios Web",$namespace);
$server->wsdl->schemaTargenNamespace=$namespace;


$server->register('Suma',
array('a'=>"xsd:int",'b'=>"xsd:int"),array("return"=>"xsd:int"),FALSE,FALSE,FALSE,FALSE,"Suma");
$server->register('Saludar', array('nombre'=>"xsd:string"),
array("return"=>"xsd:string"),FALSE,FALSE,FALSE,FALSE,"Saludar");
$server->register('ObtenerDatos',array('dni'=>"xsd:string"),array("return"=>"xsd:Array"),FALSE,FALSE,
FALSE,"Devuelve array");
//Declararemos las funciones (acciones soap) que utilizara nuestro servicio web
function Saludar($nombre){
 return "Hola ".$nombre;
}
function Suma($a,$b){
 $suma=$a+$b;
 return $suma;
}
function ObtenerDatos($dni){
 $arr= array('Antonio',"de la Rosa","41");
 return ($arr);
}

$server->register('getPVP', array('cod' => "xsd:string"), array("return" => "xsd:string"), FALSE, FALSE, FALSE, FALSE, "getPVP");


function getPVP($cod) {

    try {
        $conex = new Conexion();
        $result = $conex->query("SELECT PVP from producto where cod = '$cod'");
        if ($result->rowCount()) {
            $row = $result->fetchObject();
            $row->PVP;
            return $row;
        }
        unset($result);
        unset($conex);
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
//Desplegaremos con $server->service nuestro servicio web
$server->service(file_get_contents("php://input"));
?>