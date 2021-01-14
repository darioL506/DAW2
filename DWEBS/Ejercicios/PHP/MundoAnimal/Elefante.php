<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Elefante
 *
 * @author dario
 */
require_once 'Animal.php';
require_once 'Interfaz.php';
class Elefante extends Animal implements Interfaz {
    
    public function __construct($nombre,$peso) {
        parent::__construct($nombre,'Elefante',$peso, 'Gris');        
    }

    public function comer($param) {
        $texto = $this->nombre.' ha comido '.$param;
        return $texto;
    }

    public function dormir() {
        $texto = $this->nombre.' se duerme';
        return $texto;
    }
    
    public function hacerRuido() {
        $texto = $this->nombre.' barrita ';
        return $texto;
    }

}
