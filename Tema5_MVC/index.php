<?php

require_once './controller/ControladorProducto.php';

//$p = new Producto(2, "gorro", 15);
//ControladorProducto::insertar($p);
//echo ControladorProducto::buscarProducto(5);
$productos = ControladorProducto::recuperarTodos();
foreach($productos as $valor){
    echo "Código: ".$valor->codigo."<br>";
    echo " nombre ".$valor->nombre."<br>";
    echo " precio: ".$valor->precio."<br>";
    echo "===========================<br>";
}
