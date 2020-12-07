<?php
require_once 'Vehiculo.php';
require_once 'Coche.php';
require_once 'Bicicleta.php';

$bici1 = new Bicicleta();
echo $bici1->anda(30);
echo "<br> ";
echo $bici1->haceCaballito();
echo "<br> ";
echo "Hay ". Vehiculo::getVehiculosCreados(). " vehículos<br>";
echo "<br>";
echo "=======================================<br>";
$coche1 = new Coche();
echo $coche1->anda(25);
echo "<br>";
echo $coche1->quemaRueda();
echo $coche1->anda(25);

echo "<br>Hay ". Vehiculo::getVehiculosCreados(). " vehículos<br>";
