<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mangosta
 *
 * @author faranzabe
 */
require_once 'Bicho.php';
require_once 'Interfaz.php';
class Mangosta extends Bicho implements Interfaz {

    private $tieneHambre;

    function __construct($especie, $vivo, $tieneHambre) {
        parent::__construct($especie, $vivo);
        $this->tieneHambre = $tieneHambre;
    }

    function isTieneHambre() {
        return $this->tieneHambre;
    }

    function setTieneHambre($tieneHambre): void {
        $this->tieneHambre = $tieneHambre;
    }

    public function __toString() {
        return parent::__toString() . ' tiene hambre?' . $this->tieneHambre;
    }

    public function mover() {
        echo 'Movimiento de la mangosta.'.'<br>';
    }

    public function comun() {
        
    }

    public function obligatorio() {
        
    }

}
