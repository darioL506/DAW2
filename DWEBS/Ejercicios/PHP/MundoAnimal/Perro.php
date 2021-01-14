<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Perro
 *
 * @author dario
 */
require_once 'Animal.php';
require_once 'Interfaz.php';
class Perro extends Animal implements Interfaz {
    
    public function __construct($nombre,$peso, $color) {
        parent::__construct($nombre,'Perro',$peso, $color);           
    }
    
    protected function hacerCaso(){
        $rmd = rand(1,100);
        $texto;
        if($rmd>=10) {
            $texto = $this->nombre.' te hace caso';
        } else {
            $texto = $this->nombre.' pasa de tu cara';
        }
        return $texto;
    }

    public function hacerRuido(){
        $texto = $this->nombre.' ladra muy fuerte ';
        return $texto;
    }
    
    public function sacarPaseo() {
        $texto = 'Sales a dar un paseo con '.$this->nombre;
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
