<?php

require_once './controller/conexion.php';
require_once './modelo/Juegos.php';
require_once './modelo/Cliente.php';

class controladorAlquiler {

    public static function insertar($id, $codigo, $dni, $fechaA, $fechaD) {
        try {
            $conex = new Conexion();
            $conex->exec("INSERT INTO alquiler VALUES('$id','$codigo','$dni','$fechaA','$fechaD')");
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
    
     

    public function recuperarTodosConCliente() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT Imagen, Nombre_juego, Nombre_consola,Anno, Precio, Nombre FROM alquiler, cliente, juegos WHERE Cod_juego=Codigo AND DNI_cliente=DNI AND Fecha_devol='null'");

            return $result;
            
        } catch (PDOException $ex) {
            die('error con la base de datos');
        }
        unset($result);
        unset($conex);
    }
    
     public function cambiarAlquilerSI($cod) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("UPDATE juegos SET Alguilado=? WHERE Codigo ='$cod'");
           
            $alquiler = "SI";
            $result->bindParam(1, $alquiler);
            
            $result->execute();
            $result = null;
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }
      
          public function cambiarAlquilerNO($cod) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("UPDATE juegos SET Alguilado=? WHERE Codigo ='$cod'");
           
            $alquiler = "NO";
            $result->bindParam(1, $alquiler);
            
            $result->execute();
            $result = null;
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }
      
            public function fechaDevolucion($cod) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("UPDATE alquiler SET Fecha_devol=? WHERE Cod_juego ='$cod'");
           
            $fechaD = date("Y-n-d");
            $result->bindParam(1, $fechaD);
            
            $result->execute();
            $result = null;
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }
      
       public function calculoFechas($id,$cod) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * from alquiler WHERE id='$id' AND Cod_juego='$cod'");
           
           
            return $result;
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }
      
       public function pagoCliente($id) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT Precio from alquiler, juegos WHERE id='$id' AND Codigo=Cod_juego");
           
           
            return $result;
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }
      
        public function eliminarAlquiler($cod) {
        try {
            $conex = new Conexion();
            $result = $conex->exec("DELETE from alquiler WHERE Cod_juego ='$cod'");
           
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }

}
