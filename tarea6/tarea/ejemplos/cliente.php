<?php

$json = file_get_contents("http://localhost/tarea6/tarea/ejemplos/server.php");
$datos = json_decode($json);
print_r($datos);
