<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Simulación 1</h1>
        <?php
        require_once 'Animal.php';
        require_once 'Perro.php';
        require_once 'Gato.php';
        require_once 'Elefante.php';
        $magosta = new Animal('Juan', 'Mangosta', '1', 'Blanco');
        $perro = new Perro('Rex','5','Marron');
        $gato = new Gato('Misifu','5','Marron');
        $elef = new Elefante('Pepe','100');
        $zoo = [$magosta,$perro,$gato,$elef];
        
        foreach ($zoo as $aux) {
            echo $aux->comer('Lechuga').'<br>';
        }
        
        echo '<br>';
        $zoo = [$perro,$gato,$elef];
        
        foreach ($zoo as $aux) {
            echo $aux->hacerRuido().'<br>';
        }
        ?>
        <h1>Simulación 2</h1>
        <?php 
        $perro2 = new Perro('Luna','5','Gris');
        $gato2 = new Gato('Guantes','5','Gris con rayas');
        $elef2 = new Elefante('Antonio','600');
        $perro3 = new Perro('Lulu','5','Blanco');
        $gato3 = new Gato('Neko','5','Rayas blancas y negras');
        $elef3 = new Elefante('Dumbo','550');
        $perro4 = new Perro('Coke','5','Marron');
        $gato4 = new Gato('Gorda','5','Blanco');
        $elef4 = new Elefante('Lore','560');
        $perro5 = new Perro('Morton','5','Negro');
        $gato5 = new Gato('Loki','5','Negro');
        $elef5 = new Elefante('Manolo','570');        
        $zoo = [$perro,$gato,$elef,$perro2,$gato2,$elef2,$perro3,$gato3,$elef3,$perro4,$gato4,$elef4,$perro5,$gato5,$elef5];
        
        $parque = [];
        
        for($i=0;$i<60;$i++) {
            flush();
            ob_flush();
            usleep(500000);
            echo '<h3>Tiempo = '.$i.' segundos</h3>';
            $rmd = rand(0,14);
            $aux = $zoo[$rmd];
            if($i%10==0 && $i>0){                          
                
                if(sizeof($parque)<10) {
                    echo $aux->getNombre().' entra <br>';
                    $parque[] = $aux;
                } else {
                    echo $aux->getNombre().' intenta entrar pero el parque esta lleno <br>';
                }
            
            }
            foreach ($parque as $indice=>$animal) {
                $seVa = rand(1,100);
                if($i%2==0 && $i>2) {
                    $rmd = rand(1,3);
                    if($rmd==1) {
                        echo $animal->comer('su pienso').'<br>';
                    }
                    if($rmd==2) {
                        echo $animal->hacerRuido().'<br>';
                    } 
                    if($rmd==3) {
                        echo $animal->dormir().'<br>';
                    } 
                }
                
                if($i%20==0 && $seVa>=50) {
                    echo $animal->getNombre().' se va <br>';
                    //unset($parque[$i]);
                    unset($parque[$indice]);                    
                }
                
                if($i%15==0 && isSet($parque[$indice])) {
                    if(!isSet($parque[$indice-1]) && $indice>0){
                        echo $animal->getNombre().' se mueve  <br>';
                        $parque[$indice-1] = $animal;
                        unset($parque[$indice]);    
                    } else if(!isSet($parque[$indice+1])) {
                        echo $animal->getNombre().' se mueve <br>';
                        $parque[$indice+1] = $animal;
                        unset($parque[$indice]);  
                    } else {
                        echo $animal->getNombre().' no se ha podido mover <br>';
                    }
                }
            }            
            $parque = array_values($parque);
            
        }
        ?>
    </body>
</html>
