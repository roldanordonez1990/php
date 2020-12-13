<?php
require_once './modelo/Cliente.php';
require_once './controller/Conexion.php';

class controladorCliente {


public static function buscarClientePorDniYPassword($dni, $clave){
        try{
            $conex = new Conexion();
            $result = $conex->prepare("SELECT * FROM cliente WHERE DNI=? and Clave=?");
            $clave = md5($clave);
            $result->execute([$dni, $clave]);
            if($result->rowCount()){
                $cliente = $result->fetchObject();
                return new Cliente($cliente->DNI, $cliente->Nombre, $cliente->Apellios, $cliente->Direccion, $cliente->Localidad, $cliente->Clave, $cliente->Tipo);
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc){
            //$errores[]=$exc->getMessage();
           echo '<a href=index.php>Ir a inicio</a>';
           die('error con la base de datos');
        }
    }
}