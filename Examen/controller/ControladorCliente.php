<?php
require_once './model/Cliente.php';
require_once './controller/Conexion.php';

class controladorCliente {


public static function buscarClientePorDniYPassword($dni, $clave){
        try{
            $conex = new Conexion();
            $result = $conex->prepare("SELECT * FROM usuarios WHERE DNI=? and clave=?");
            $clave = md5($clave);
            $result->execute([$dni, $clave]);
            if($result->rowCount()){
                $cliente = $result->fetchObject();
                return new Cliente($cliente->Nombre, $cliente->Direccion, $cliente->Telefono, $cliente->DNI, $cliente->clave, $cliente->intentos, $cliente->bloqueado);
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc){
            //$errores[]=$exc->getMessage();
           echo '<a href=index.php>Ir a inicio</a>';
           die('error con la base de datos');
        }
    }
    
    
    public static function modificarIntentos($intentos, $dni){
         try {
            $conex = new Conexion();
            $conex->exec("UPDATE usuarios SET intentos='$intentos' WHERE DNI='$dni'");
            
        } catch (PDOException $ex) {
            //echo '<a href=index.php>Ir a inicio</a>';
            echo 'no inserto';
            //header('Location:vistaCliente.php');
            die('error con la base de datos');
            //mata el programa
        }
        unset($result);
        unset($conex);
    }
    
}