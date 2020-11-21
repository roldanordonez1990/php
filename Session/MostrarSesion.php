<?php

// debo iniciar sesión para propagarla
session_start();

echo session_id() . "<br>"; //valor
echo session_name() . "<br>"; //name

echo $_SESSION['nombre'] . "<br>";

//con estos métodos se eliminan los datos de la sesión
//session_unset();
//session_destroy();
//setcookie("PHPSESSID", "", time()-3600);

//la cookie de sesión se crea en la raíz del dominio y hay que tener en cuenta el path

//setcookie("PHPSESSID", "", time()-3600, "/");