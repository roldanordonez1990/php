<?php

if (isset($_COOKIE['intentos']) && $_COOKIE['intentos'] == 3) {
    echo "hola";
    echo "correcto";
} else {
    header('location: index.php');
}
?>
