<?php

require_once './controller/Conexion.php';
require_once './model/Cuenta.php';
require_once './model/Cliente.php';

class ControladorCuentas {

    





    public static function recuperarTodos($dni) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM cuentas WHERE dni_cuenta='$dni'");
            if ($result->rowCount()) {
                //creo un producto

                while ($row = $result->fetchObject()) {

                    $c = new Cuenta($row->iban, $row->saldo, $row->dni_cuenta);
                    $cuentas[] = clone($c);
                }
                return $cuentas;
            } else
                return false;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
    }


    
      public static function recuperarTodasCuentas() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM cuentas");
            if ($result->rowCount()) {
                //creo un producto

                while ($row = $result->fetchObject()) {

                    $c = new Cuenta($row->iban, $row->saldo, $row->dni_cuenta);
                    $cuentas[] = clone($c);
                }
                return $cuentas;
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
