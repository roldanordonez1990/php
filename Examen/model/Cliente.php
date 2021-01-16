<?php

class Cliente {
    
    public $nombre;
    public $direccion;
    public $telefono;
    public $dni;
    public $clave;
    public $intentos;
    public $bloqueado;
    
    function __construct($nombre="", $direccion="", $telefono="", $dni="", $clave="", $intentos="", $bloqueado="") {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->dni = $dni;
        $this->clave = $clave;
        $this->intentos = $intentos;
        $this->bloqueado = $bloqueado;
    }

    function nuevoCliente($nombre, $direccion, $telefono, $dni, $clave, $intentos, $bloqueado) {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->dni = $dni;
        $this->clave = $clave;
        $this->intentos = $intentos;
        $this->bloqueado = $bloqueado;
    }
    
    public function __clone() {
        
    }

  

    public function __toString() {
         return "Nombre: " .$this->nombre;
    }

    
}
