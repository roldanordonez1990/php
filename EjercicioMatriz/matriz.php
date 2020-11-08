<?php

function crearRepresentarMatriz($fil, $col) {
    $matriz1 = array();

    echo "<table border=1>";
    for ($i = 1; $i <= $fil; $i++) {

        echo "<tr>";

        for ($j = 1; $j <= $col; $j++) {
            $matriz1[$i][$j] = rand(1, 50);

            echo "<td>" . $matriz1[$i][$j] . "</td>";
        }

        echo "</tr>";
    }

    echo "</table>";

    return $matriz1;
}

function sumarMatrizFilas($matriz1, $fil, $col) {

    for ($i = 1; $i <= $fil; $i++) {
        $sumaFilas = 0;
        for ($j = 1; $j <= $col; $j++) {

            $sumaFilas += $matriz1[$i][$j];
        }
        $array[] = $sumaFilas;
        //$array[] = $sumaFila;
        echo 'La fila ' . $i . ' suma ' . $sumaFilas . '<br/>';
    }

    return $array;
}

function sumarMatrizColumnas($matriz1, $fil, $col) {

    for ($i = 1; $i <= $fil; $i++) {
        $sumaColumnas = 0;
        for ($j = 1; $j <= $col; $j++) {

            $sumaColumnas += $matriz1[$j][$i];
        }
        $array[] = $sumaColumnas;

        echo 'La columna ' . $j . ' suma ' . $sumaColumnas . '<br/>';
    }

    //return $array;
}

function sumarMatrizTotal($matriz1, $fil, $col) {
    $suma = 0;
    for ($i = 1; $i <= $fil; $i++) {

        for ($j = 1; $j <= $col; $j++) {

            $suma += $matriz1[$i][$j];
        }
        $array[] = $suma;
    }
    echo 'La matriz suma: ' . $suma . '<br/>';
    //return $array;
}

function sumarMatrizDiagonal($matriz1, $fil, $col) {
    $sumaDiagonal = 0;

    for ($i = 1; $i <= $fil; $i++) {

        for ($j = 1; $j <= $col; $j++) {
            if ($i == $j) {
                $sumaDiagonal += $matriz1[$i][$j];
            }
        }
        // $array[] = $sumaDiagonal;
    }
    echo 'La suma diagonal izquierda es : ' . $sumaDiagonal . '<br/>';
    //return $array;
}
