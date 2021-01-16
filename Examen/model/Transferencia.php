<?php

class Transferencia {
    
    public $iban_origen;
    public $iban_destino;
    public $fecha;
    public $cantidad;
  
    
    function __construct($iban_origen="", $iban_destino="", $fecha="", $cantidad="") {
        $this->iban_origen = $iban_origen;
        $this->iban_destino = $iban_destino;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;
    }

        function nuevaTransferencia($iban_origen, $iban_destino, $fecha, $cantidad) {
         $this->iban_origen = $iban_origen;
        $this->iban_destino = $iban_destino;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;
    }
    
    public function __clone() {
        
    }

 
    
}
