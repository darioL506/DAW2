<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Puma
 *
 * @author faranzabe
 */
require_once 'Bicho.php';

class Puma extends Bicho {
    private $corre;
    
    function __construct($especie, $vivo, $corre) {
        parent::__construct($especie, $vivo);
        $this->corre = $corre;
    }
    
    function getCorre() {
        return $this->corre;
    }

    function setCorre($corre): void {
        $this->corre = $corre;
    }

    public function mover() {
        echo 'Movimiento del puma.'.'<br>';
    }

    public function comun() {
        
    }

    public function obligatorio() {
        
    }

}
