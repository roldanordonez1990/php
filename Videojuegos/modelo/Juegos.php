<?php

class Juegos {

    public $codigo;
    public $nombre_juego;
    public $nombre_consola;
    public $anno;
    public $precio;
    public $alquilado;
    public $imagen;
    public $descripcion;
    
    
    function __construct($codigo="", $nombre_juego="", $nombre_consola="", $anno="", $precio="", $alquilado="", $imagen="", $descripcion="") {
        $this->codigo = $codigo;
        $this->nombre_juego = $nombre_juego;
        $this->nombre_consola = $nombre_consola;
        $this->anno = $anno;
        $this->precio = $precio;
        $this->alquilado = $alquilado;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
    }
    
       function nuevoJuego($codigo, $nombre_juego, $nombre_consola, $anno, $precio, $alquilado, $imagen, $descripcion) {
        $this->codigo = $codigo;
        $this->nombre_juego = $nombre_juego;
        $this->nombre_consola = $nombre_consola;
        $this->anno = $anno;
        $this->precio = $precio;
        $this->alquilado = $alquilado;
        $this->imagen = $imagen;
         $this->descripcion = $descripcion;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
         $this->$name=$value;
    }
    
//    public function __toString() {
//         return "Nombre: " .$this->nombre_juego. " Nombre Consola ".$this->nombre_consola. " Precio".$this->precio. " Alquilado".$this->alquilado;
//    }


}
