<?php

class Cuenta {
    
    public $iban;
    public $saldo;
    public $dni_cuenta;
  
    
    function __construct($iban="", $saldo="", $dni_cuenta="") {
        $this->iban = $iban;
        $this->saldo = $saldo;
        $this->dni_cuenta = $dni_cuenta;
    }

        function nuevaCuenta($iban, $saldo, $dni_cuenta) {
        $this->iban = $iban;
        $this->saldo = $saldo;
        $this->dni_cuenta = $dni_cuenta;
    }
    
    public function __clone() {
        
    }

    
}
