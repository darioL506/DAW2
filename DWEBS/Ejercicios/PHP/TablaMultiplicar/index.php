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
    <body style="text-align: center">
        <?php
        // put your code here        
        ?>
        <h1>Tabla de multiplicar</h1>
        <p>Inserta un número</p>
        <form name="formulario" action="verNum.php" method="POST">
            <input type="number" name="num1" required>
            <input type="submit" name="aceptar" value="Empezar">
        </form>
    </body>
</html>
