<?php

 class Canario extends Ave{
    
    protected $volar;
    
     public function __construct($nombre = "", $edad = "", $color = "", $volar= "") {
       parent::__construct($nombre, $edad, $color); // parent hace referencia al padre, ::hace referencia a un método de la clase
   
       $this->volar=$volar;
   }
   
    // hay que sobreescribir el método toString, ya que por defecto aparece el del constructo
   public function __toString() {
       return parent::__toString()." ¿Puedo volar?->".$this->volar;
   }
   
   public function accion() {
        return "cantar";
    }
}
