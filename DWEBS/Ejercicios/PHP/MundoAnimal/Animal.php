<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Animal
 *
 * @author dario
 */
class Animal {
    protected $nombre;
    private $raza;
    protected $peso;
    protected $color;
    
    function __construct($nombre, $raza, $peso, $color) {
        $this->nombre = $nombre;
        $this->raza = $raza;
        $this->peso = $peso;
        $this->color = $color;
    }
    
    function getNombre() {
        return $this->nombre;
    }

    function getRaza() {
        return $this->raza;
    }

    function getPeso() {
        return $this->peso;
    }

    function getColor() {
        return $this->color;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setRaza($raza) {
        $this->raza = $raza;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }

    function setColor($color) {
        $this->color = $color;
    }

    protected function vacunar() {
        $texto = $this->nombre.' ha sido vacunado';
        return $texto;
    }
    
    public  function comer($param) {
        $texto = $this->nombre.' ha comido '.$param;
        return $texto;
    }        
    
    protected function hacerCaso() {
        $rmd = rand(1,100);
        $texto;
        if($rmd>50) {
            $texto = $this->nombre.' te hace caso';
        } else {
            $texto = $this->nombre.' pasa de tu cara';
        }
        return $texto;
    }

}
