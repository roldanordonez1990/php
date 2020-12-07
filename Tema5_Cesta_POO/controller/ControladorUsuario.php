<?php
require_once '../modelo/Usuario.php';
require_once '../modelo/Conexion.php';

class controladorUsuario {
//
//    public static function buscarUsuarioPorNombreYPassword($nombre, $password) {
//        try {
//            $conexion = new Conexion();
//            $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE nombre=? AND password=?");
//            $password = md5($password);
//            $consulta->execute([$nombre, $password]);
//            if ($consulta->rowCount()) {
//                $usuario = $consulta->fetchObject();;
//                return new usuario($usuario->nombre, $usuario->password);
//            }
//            unset($consulta);
//            unset($conexion);
//        } catch (PDOException $exc) {
//             echo '<a href=index.php>Ir a inicio</a>';
//            die('error con la base de datos');
//        }
//    }
//    
//
//}

public static function buscarUsuarioPorNombreYPassword($nombre, $password){
        try{
            $conex = new Conexion();
            //$result = $conex->query("SELECT * FROM usuarios WHERE nombre='$_POST[nombre]' and password='" . md5($_POST["pass"]) . "'");
            $result = $conex->prepare("SELECT * FROM usuarios WHERE nombre=? and password=?");
            $password = md5($password);
            $result->execute([$nombre, $password]);
            if($result->rowCount()){
                $usuario = $result->fetchObject();
                return new Usuario($usuario->nombre, $usuario->password);
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