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
        <h1>Has perdido</h1>
        <p>
            El número era 
            <?php
                session_start();
                echo $_SESSION['numAl'];
                //Borro el número para poder reiniciar con otro nuevo                
                unset($_SESSION['numAl']);
            ?>
        </p>
        <form name="form1" action="index.php">                                    
            <input type="submit" name="submi" value="Volver a empezar">
        </form>
    </body>
</html>
