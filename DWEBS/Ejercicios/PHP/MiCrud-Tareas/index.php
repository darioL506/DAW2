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
        <h1>Login</h1>
        <?php
        require_once 'GestionDatos.php';
        require_once 'controlador.php';
        ?>
        <form name="formLogin" action="controlador.php">
            <p>Nombre: <input type="text" name="nameLog" placeholder="Nombre" required></p>
            <p>Pass: <input type="password" name="passLog" required></p>
            <input type="submit" name="submLog" value="Aceptar">            
        </form>        
        <form name="form2" action="controlador.php">
            <input type="submit" name="admin" value="Admin">
        </form>
        <form name="form3" action="controlador.php">
            <input type="submit" name="regist" value="Registrarse">
        </form>        
    </body>
</html>
