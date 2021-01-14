<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mosca
 *
 * @author dario
 */
class Mosca {
    private $tabla;
    
    function __construct() {
        $this->tabla = [];
        $rmd = rand(0,9);
        for($i=0;$i<10;$i++) {
            
            $this->tabla[$i]= 'vacio';
            
        }
        $this->addMosca($rmd);
    }
    
    
    public function golpeCerca() {
        $rmd = rand(0,9);
        $this->addMosca($rmd);
    }
    
    public function dibujaForm() {
        $form = '<form name="tabla" action="controlador.php" method="POST">';
        for($i=0;$i<10;$i++){
            if($this->tabla[$i]==='cerca') {
                $form .= '<input type="submit" name="cerca" value="">';
            } else if($this->tabla[$i]==='mosca') {
                $form .= '<input type="submit" name="mosca" value="">';
            } else {
                $form .= '<input type="button" name="vacio" value="">';
            }
        }
        $form .= '</form>';
        return $form;
    }
    
    /*private function creaTabla() {
        $rmd = rand(0,9);
        for($i=0;$i<10;$i++) {
            if($i==$rmd) {
                $this->addMosca($i);
            } else {
                $this->tabla[$i]= 'vacio';
            }
        }
    }*/
    
    private function addMosca($i) {
        if($i == 0) {
            $this->tabla[0]='mosca';
            $this->tabla[1]='cerca';                        
        } else if($i == 9){
            $this->tabla[8]='cerca';
            $this->tabla[9]='mosca';
        } else {
            $this->tabla[$i-1]='cerca';
            $this->tabla[$i] = 'mosca';
            $this->tabla[$i+1] = 'cerca';            
        }
    }
}
