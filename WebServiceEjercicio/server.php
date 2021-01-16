<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once 'Conexion.php';
$server = new nusoap_server();
$namespace = "http://localhost/WebServiceEjercicio/server.php";

$server->configureWSDL("Tarea6 Servicios Web", $namespace);
$server->wsdl->schemaTargenNamespace = $namespace;


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