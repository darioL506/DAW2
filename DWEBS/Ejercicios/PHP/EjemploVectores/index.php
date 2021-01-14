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
        // put your code here
        $vector = array(1,2,3);
        $vec2 = [7,8,9];                
        
        for($i=0;$i<count($vector);$i++) {
            echo $i.'-->'.$vector[$i].' ';
        }
        
        echo "<br>";
        
        foreach($vec2 as $ind => $dato) {
        //foreach($vec2 as $dato) {
            echo $ind.'-->'.$dato.' ';
        }
        ?>
    </body>
</html>
