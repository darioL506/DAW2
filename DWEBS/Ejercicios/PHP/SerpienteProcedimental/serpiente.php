<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function nacer(&$c) {
    $c[]= dameColor();
}

function dameColor() {
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

function crece(&$edad,&$cuerpo) {
    $edad++;
    $rmd = rand(1,100);
    if($edad <= 10) {
        if ($rmd <= 70) {
            array_push($cuerpo, dameColor());
        } else {
            mudaPiel($cuerpo);
        }
    } else {
        if ($rmd <= 80) {
            if(sizeof($cuerpo)>0) {
                array_shift($cuerpo);
            }
        } else {
            mudaPiel($cuerpo);
        }
    }
}

function mudaPiel(&$cuerpo) {
    for($i=0;$i<sizeof($cuerpo);$i++) {
        $cuerpo[$i] = dameColor();
    }
}

