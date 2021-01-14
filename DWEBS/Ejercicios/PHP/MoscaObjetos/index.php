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
    <style>
        input {
            width: 100px;
        }
    </style>
    <body>
        <?php
        // put your code here
        require_once 'Mosca.php';
        
        $mosca = new Mosca();
        session_start();
        if(!isset($_SESSION['move'])){
            $_SESSION['move'] = false;
        }
        if($_SESSION['move']) {
            echo '<p>La mosca estaba cerca, pero se ha movido</p>';
        }
        echo $mosca->dibujaForm();
        ?>
    </body>
</html>
