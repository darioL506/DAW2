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
        require_once 'serpiente.php';
        $serpiente = new Serpiente();
        
        $mangosta = false;
        
        while (sizeof($serpiente->getCuerpo()) > 0 && !$mangosta) {                        
            flush();
            ob_flush();
            sleep(1);
            for ($i=0; $i<sizeof($serpiente->getCuerpo());$i++) {
        ?>
        <input style="background-color: <?=$serpiente->getCuerpo()[$i]?>" type="text" readonly name="color">
        <?php
            }
        ?><br><?php
        $serpiente->crece();
        $rmd = rand(1,100);
            if ($rmd <=10) {
                $mangosta = true;
                echo 'La mangosta a matado a la serpiente (edad: '.$serpiente->getEdad().')';
                $serpiente->decrece();
            }
        }
        
        if(sizeof($serpiente->getCuerpo())==0) {
            echo 'La serpiente ha muerto con '.$serpiente->getEdad().' años';
        }
        ?>
    </body>
</html>
