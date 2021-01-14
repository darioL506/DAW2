<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of serpiente
 *
 * @author dario
 */
class Serpiente {   
    private $edad;
    private $cuerpo = [];
    
    public function __construct() {        
        $this->edad = 0;
        array_push($this->cuerpo, $this->dameColor());
    }   

    public function getEdad() {
        return $this->edad;
    }

    public function getCuerpo() {
        return $this->cuerpo;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function setCuerpo($cuerpo) {
        $this->cuerpo = $cuerpo;
    }
    
    private function dameColor() {
        $color;
        $rmd = rand(1,4);
        switch ($rmd) {
            case 1:
                $color = "green";
                break;
            case 2:
                $color = "red";
                break;
            case 3:
                $color = "blue";
                break;
            case 4:
                $color = "brown";
                break;
        }
        return $color;
    }
    
    public function crece() {
        $this->edad++;
        $rmd = rand(1,100);
        if($this->edad <= 10) {
            if ($rmd <= 70) {
                array_push($this->cuerpo, $this->dameColor());
            } else {
                $this->mudaPiel($this->cuerpo);
            }
        } else {
            if ($rmd <= 80) {
                if(sizeof($this->cuerpo)>0) {
                    $this->decrece();
                }
            } else {
                $this->mudaPiel($this->cuerpo);
            }
        }
    }
    
    public function decrece() {
        array_shift($this->cuerpo);
    }


    private function mudaPiel() {
    for($i=0;$i<sizeof($this->cuerpo);$i++) {
        $this->cuerpo[$i] = $this->dameColor();
    }
}
}
