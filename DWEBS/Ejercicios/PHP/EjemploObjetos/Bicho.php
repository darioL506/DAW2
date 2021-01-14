<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bicho
 *
 * @author faranzabe
 */
abstract class Bicho {
    protected $especie;
    protected $vivo;
    private static $CUANTOS;
    
    public function __construct($especie, $vivo) {
        $this->especie = $especie;
        $this->vivo = $vivo;
        self::$CUANTOS++;
    }
    
    public function getEspecie() {
        return $this->especie;
    }

    public function isVivo() {
        return $this->vivo;
    }

    public function setEspecie($especie) {
        $this->especie = $especie;
    }

    function setVivo($vivo) {
        $this->vivo = $vivo;
    }

    public function __toString() {
        return 'Especie: '.$this->especie.' vivo:'.$this->vivo;
    }

    static function getCUANTOS() {
        return self::$CUANTOS;
    }

    public function mover(){
        echo 'Movimiento del bicho general'.'<br>';
    }

   public abstract function obligatorio();

}
