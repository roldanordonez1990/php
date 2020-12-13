<?php

require_once './controller/Conexion.php';
require_once './modelo/Juegos.php';


class ControladorJuego {

    public static function insertar(Juegos $j) {
        try {
            $conex = new Conexion();
            $conex->exec("INSERT INTO juegos VALUES ('$j->codigo','$j->nombre_juego','$j->nombre_consola','$j->anno','$j->precio','$j->alquilado','$j->imagen','$j->descripcion')");
            // si queremos que devuelva algo return;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }
    
    
        public static function buscarJuego($cod) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos WHERE Codigo='$cod'");
            if ($result->rowCount()) {
                $row = $result->fetchObject();
                 $j = new Juegos($row->Codigo, $row->Nombre_juego, $row->Nombre_consola, $row->Anno, $row->Precio, $row->Alguilado, $row->Imagen, $row->descripcion);
                // como es un objeto de la misma clase se puede hacer así
                return $j;
            } else
                return false;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
    }
    
 public static function recuperarTodos() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos");
            if ($result->rowCount()) {
                //creo un producto
                
                while ($row = $result->fetchObject()) {
                    
                     $j = new Juegos($row->Codigo, $row->Nombre_juego, $row->Nombre_consola, $row->Anno, $row->Precio, $row->Alguilado, $row->Imagen);
                     $juegos[] = clone($j);   
                }
                 return $juegos;
            } else
                return false;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }
      
      
       public function recuperarAlquiladosUsuario($dni) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos, alquiler WHERE Cod_juego=Codigo AND Alguilado='SI' AND DNI_cliente='$dni'");
                    
            return $result;
           
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
         unset($result);
        unset($conex);
      }
      
       public static function recuperarNoAlquilados() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos where Alguilado='NO'");
            if ($result->rowCount()) {
                //creo un producto
                
                while ($row = $result->fetchObject()) {
                    
                     $j = new Juegos($row->Codigo, $row->Nombre_juego, $row->Nombre_consola, $row->Anno, $row->Precio, $row->Alguilado, $row->Imagen);
                     $juegos[] = clone($j);   
                }
                 return $juegos;
            } else
                return false;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }

      
}
