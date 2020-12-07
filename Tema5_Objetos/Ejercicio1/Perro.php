<?php

class Perro extends Mamifero{
    
    protected $raza;
    
     public function __construct($nombre = "", $edad = "", $color = "", $raza= "") {
       parent::__construct($nombre, $edad, $color); // parent hace referencia al padre, ::hace referencia a un método de la clase
   
       $this->raza=$raza;
   }
   
    // hay que sobreescribir el método toString, ya que por defecto aparece el del constructo
   public function __toString() {
       return parent::__toString()." y soy de la raza ".$this->raza;
   }
   public function accion() {
        return "ladrar";
    }
}
