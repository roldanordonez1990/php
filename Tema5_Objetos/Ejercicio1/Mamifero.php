<?php
require_once 'Animal.php';

abstract class Mamifero extends Animal{
    
   protected $color;
   
    public function __construct($nombre, $edad, $color) {
       parent::__construct($nombre, $edad); // parent hace referencia al padre, ::hace referencia a un método de la clase
   
       $this->color=$color;
   }
   
   public function __toString() {
       return parent::__toString()." y soy de color ".$this->color;
   }

}

