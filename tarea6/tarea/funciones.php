<?php

require_once './Conexion.php';

function getPVP($codProducto) {

    try {
        $conex = new Conexion();
        $result = $conex->query("SELECT PVP FROM producto WHERE cod='$codProducto'");

        if ($result->rowCount()) {

            $registro = $result->fetchObject();

            $pvp = $registro->PVP;
            return $pvp;
        }
        unset($result);
        unset($conex);
    } catch (PDOException $exc) {
        $errores[] = $exc->getMessage();
        die('Error en bbdd');
    }
}

function getStock($codProducto, $codTienda) {

    try {
        $conex = new Conexion();
        $result = $conex->query("SELECT unidades FROM stock WHERE producto='$codProducto' AND tienda='$codTienda'");

        if ($result->rowCount()) {

            $registro = $result->fetchObject();

            $stock = $registro->unidades;
            return $stock;
        }
        unset($result);
        unset($conex);
    } catch (PDOException $exc) {
        $errores[] = $exc->getMessage();
        die('Error en bbdd');
    }
}

function getFamilias() {

    try {
        $conex = new Conexion();
        $result = $conex->query("SELECT cod FROM familia");
        $familias = [];
        if ($result->rowCount()) {
            
            while($registro = $result->fetchObject()){
                foreach ($registro as $value) {
                array_push($familias, $value);    
                }
                
            }
            return $familias;
        }
        unset($result);
        unset($conex);
    } catch (PDOException $exc) {
        $errores[] = $exc->getMessage();
        die('Error en bbdd');
    }
}

function getProductosFamilia($codFamilia) {

    try {
        $conex = new Conexion();
        $result = $conex->query("SELECT cod FROM producto where familia='$codFamilia'");
        $codigoArray = [];
        if ($result->rowCount()) {
            
            while($registro = $result->fetchObject()){
                foreach ($registro as $value) {
                array_push($codigoArray, $value);    
                }
                
            }
            return $codigoArray;
        }
        unset($result);
        unset($conex);
    } catch (PDOException $exc) {
        $errores[] = $exc->getMessage();
        die('Error en bbdd');
    }
}

?>