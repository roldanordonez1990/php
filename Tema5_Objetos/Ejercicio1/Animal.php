<?php

abstract class Animal {
    
    public $nombre;
    public $edad;
    public static $numeroanimales = 0;


 // creo un método estático cuando quiero un método que no requiera usar una instancia para poder usarlo
    function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        self :: $numeroanimales++;
    }
    
     public static function Animal(){
        return self::$numeroanimales;
    }
    
    public function __destruct() {
        return self::$numeroanimales--;
    }
    
     // a todos los que clone se les pone la edad 0
    public function __clone() {
        $this->edad=0;
    }
    
    function __get($name) {
        return $this->$name;
    }
    
    function __set($name, $value) {
        $this->$name=$value;
    }

    
     function __toString() {
        return "Soy " .$this->nombre. " ,tengo ". $this->edad. " años";
    }
    
     function __call($name, $arguments) {
        if($name == "movimiento"){
            if(count($arguments)==1){
                $this->nombre=$arguments[0];
            }
            if(count($arguments)==2){
                $this->nombre=$arguments[0];
                $this->edad=$arguments[1];
            }
        }
    }
    
    abstract public function accion();
    
}