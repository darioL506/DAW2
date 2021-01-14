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
        $edad = 0;
        $cuerpo;
        nacer($cuerpo);
        $mangosta = false;
        
        while (sizeof($cuerpo) > 0 && !$mangosta) {                        
            flush();
            ob_flush();
            sleep(1);
            for ($i=0; $i<sizeof($cuerpo);$i++) {
        ?>
        <input style="background-color: <?=$cuerpo[$i]?>" type="text" readonly name="color">
        <?php
            }
        ?><br><?php
        crece($edad, $cuerpo);
        $rmd = rand(1,100);
            if ($rmd <=10) {
                $mangosta = true;
                echo 'La mangosta a matado a la serpiente (edad: '.$edad.')';
                array_shift($cuerpo);
            }
        }
        
        if(sizeof($cuerpo)==0) {
            echo 'La serpiente ha muerto con '.$edad.' años';
        }
        ?>
    </body>
</html>
