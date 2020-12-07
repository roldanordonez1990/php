<html>

    <head></head>
    <body>
<?php
require_once 'Animal.php';
require_once 'Mamifero.php';
require_once 'Ave.php';
require_once 'Perro.php';
require_once 'Canario.php';
require_once 'Lagarto.php';

//$a = new Animal("Grison", 50);
//$m = new Mamifero("Bartolo", 34, "marron");
//$av = new Ave("Voladora",4, "blanco");
$perro = new Perro("Bruno", 5, "blanco", "chucho");
$canario = new Canario("Piolín", 4, "amarillo", "si");
$lagarto = new Lagarto("willy", 34, "verde", "komodo");


//echo "<br>";
//echo $m;
//echo "<br>";
//echo $av;
//echo "<br>";
//$a1 = clone($a);
//$m1 = clone($m);
//echo $a1;
//echo "<br>";
//echo $m1;
echo "<br>";
echo $perro. " -- Acción:".$perro->accion();;
echo "<br>";
echo $canario. " -- Acción:".$canario->accion();
echo "<br>";
echo $lagarto. " -- Acción:".$lagarto->accion();

//function cambiar($m){
//    $m->color="azul";
//}

//cambiar($m);
//echo "<br>";
//echo $m;
//echo "<br>";
//$m->movimiento("Federico", 25);
//$m->movimiento("Federico", 3500);
//echo $m;
//echo "<br>";
echo "<br>";
$canario->movimiento("Piolin", 21);
echo $canario;
echo "<br>";
echo Animal::Animal();
?>

    </body>
</html>