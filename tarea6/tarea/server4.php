<?php

require_once __DIR__ . '/vendor/autoload.php';
$server = new nusoap_server();
$namespace = "http://localhost/area6/tarea/server4.php";
$server->configureWSDL("Tarea 6", $namespace);
$server->wsdl->schemaTargenNamespace = $namespace;


$server->register('mano', array('cantidad' => "xsd:int"), array("return" => "xsd:Array"), FALSE, FALSE, FALSE, FALSE, "mano");

function mano($cantidad) {
    $numero = array(1, 2, 3, 4, 5, 6, 7, 'Sota', 'Caballo', 'Rey');
    $palo = array("Oros", "Copas", "Espadas", "Bastos");
    for ($i = 1; $i <= $cantidad; $i++) {
        $numeroAleatorio[] = $numero[array_rand($numero)];
        $paloAleatorio[] = $palo[array_rand($palo)];
        $combinacion = array_merge($numeroAleatorio, $paloAleatorio);
        //print_r($cartas);
      
        $mano[]=$combinacion;
       
    }
    return $mano;
}

//Desplegaremos con $server->service nuestro servicio web
$server->service(file_get_contents("php://input"));
?>