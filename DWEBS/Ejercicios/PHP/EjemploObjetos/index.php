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
        <?php
        require_once 'Bicho.php';
        require_once 'Mangosta.php';
        require_once 'Puma.php';
        
        $man = new Mangosta("Mangosta",true,true);
        echo $man.'<br>';
        $pu = new Puma("Puma",true,70);
        echo $pu.'<br>';
        $b = new Bicho("Mamífero",true);
        $b2 = new Bicho("Pajarraco",false);
        $b3 = $b2;
        
        $b3->setEspecie("Pez");
        echo $b.'<br>';
        echo $b2.'<br>';
        if ($b2->isVivo()){
            echo 'Bicho vivo'.'<br>';
        }
        else {
            echo 'Bicho muerto'.'<br>';
        }
        echo 'Has definido '.Bicho::getCUANTOS().' bichos.'.'<br>';
        
        $v=[$b, $b2, $man, $pu];
        foreach ($v as $bi){
            if ($bi instanceof Mangosta){
                echo 'Es una mangosta';
            }
            //w$bi->obligatorio();
        }
        ?>
    </body>
</html>
