<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function creaTabla(&$tabla) {
    $rmd = rand(0,9);
    for($i=0;$i<10;$i++) {
        if($i==$rmd) {
            addMosca($i, $tabla);
        } else {
            $tabla[$i]= 'vacio';
        }
    }
}

function addMosca(&$i,&$tabla) {
    if($i == 0) {
        $tabla[0]='mosca';
        $tabla[1]='cerca';
        $i = $i+2;
    } else if($i == 9){
        $tabla[8]='cerca';
        $tabla[9]='mosca';
    } else {
        $tabla[$i-1]='cerca';
        $tabla[$i] = 'mosca';
        $tabla[$i+1] = 'cerca';
        $i++;
    }
}

function golpeCerca($tabla) {
    $rmd = rand(0,9);
    addMosca($rmd, $tabla);
}

function dibujaForm($tabla) {
    $form = '<form name="tabla" action="controlador.php" method="POST">';
    for($i=0;$i<10;$i++){
        if($tabla[$i]==='cerca') {
            $form .= '<input type="submit" name="cerca" value="">';
        } else if($tabla[$i]==='mosca') {
            $form .= '<input type="submit" name="mosca" value="">';
        } else {
            $form .= '<input type="button" name="vacio" value="">';
        }
    }
    $form .= '</form>';
    return $form;
}
