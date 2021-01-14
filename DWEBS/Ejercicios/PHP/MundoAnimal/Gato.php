<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gato
 *
 * @author dario
 */
require_once 'Animal.php';
require_once 'Interfaz.php';
class Gato extends Animal implements Interfaz {
    public function __construct($nombre,$peso, $color) {
        parent::__construct($nombre,'Gato',$peso, $color);        
    }
    
    protected function hacerCaso(){
        $rmd = rand(1,100);
        $texto;
        if($rmd>=95) {
            $texto = $this->nombre.'te hace caso';
        } else {
            $texto = $this->nombre.'pasa de tu cara';
        }
        return $texto;
    }

    public function hacerRuido() {
        $texto = $this->nombre.' suelta un maullido ';
        return $texto;
    }
    
    public function toserBolaPelo() {
        $texto = $this->nombre.' escupe una bola de pelo';
        return $texto;
    }

    public function comer($param) {
        $texto = $this->nombre.' ha comido '.$param;
        return $texto;
    }
    
    public function dormir() {
        $texto = $this->nombre.' se duerme';
        return $texto;
    }

}
