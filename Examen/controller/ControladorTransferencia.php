<?php

require_once './controller/Conexion.php';
require_once './model/Cuenta.php';
require_once './model/Cliente.php';
require_once './model/Transferencia.php';

class ControladorTransferencia {




    public static function buscarCuenta($iban) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM cuentas WHERE iban='$iban'");
            if ($result->rowCount()) {
                $row = $result->fetchObject();
                $c = new Cuenta($row->iban, $row->saldo, $row->dni_cuenta);
                // como es un objeto de la misma clase se puede hacer así
                return $c;
            } else
                return false;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
    }

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
    
    public static function insertar(Transferencia $t) {
        try {
            $conex = new Conexion();
            $conex->exec("INSERT INTO transferencias VALUES('$t->iban_origen','$t->iban_destino','$t->fecha','$t->cantidad')");
            // si queremos que devuelva algo return;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos transfer');
            //mata el programa
        }
        unset($conex);
    }
    
        public function modificarSaldosOrigen($saldo, $iban) {
        try {
            $conex = new Conexion();
            $conex->exec("UPDATE cuentas SET saldo='$saldo' WHERE iban='$iban'");
            
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
       public function modificarSaldosDestino($saldo, $iban) {
        try {
            $conex = new Conexion();
            $conex->exec("UPDATE cuentas SET saldo='$saldo' WHERE iban='$iban'");
            
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
    
    
    public function recuperarTransferenciasCliente($cuenta) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM transferencias WHERE iban_origen='$cuenta'");

            return $result;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
    }
    
    

}

