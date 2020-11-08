<?php

$numeros1 = array();
$numeros2 = array();

for ($i = 0; $i < 4; $i++) {
    $aleatorio1 = random_int(1, 50);
    $aleatorio2 = random_int(1, 50);
    $numeros1[] = $aleatorio1;
    $numeros2[] = $aleatorio2;
}

print_r($numeros1);
echo "<br>";
print_r($numeros2);
echo "<br>";
$arrayUnido = array_merge($numeros1, $numeros2);
print_r($arrayUnido);
echo "<br>";
?>

<?php

$numeors3 = array();
foreach ($arrayUnido as $index => $valores) {

    if ($index % 2 != 0) {
        $numeors3[] = $valores;
    } else {
        $numeors3[] = $valores;
    }
}
print_r($numeors3);
echo "<br>";

$ordenarArrayUnido = sort($numeors3);
print_r($numeors3);
echo "<br>";
echo "<br>";
?>

<?php

for ($i = 0; $i < count($numeors3) - 1; $i++) {

    if ($numeors3[$i + 1] < $numeors3[$i]) {

        $aux = $numeors3[$i + 1];
        $numeors3[$i + 1] = $numeors3[$i];
        $numeors3[$i] = $aux;
    }
}

foreach ($numeors3 as $indice => $valorFinal) {
    echo "Indice " . $indice . " valor: " . $valorFinal . "<br>";
    //print_r($valorFinal . " ,");
}
?>