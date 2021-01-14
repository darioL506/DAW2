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
        <h1>Registro</h1>
        <form name="form1" action="../controlador.php">
            <p>Nombre: <input type="text" name="nameRegist" placeholder="Nombre" required></p>
            <p>Pass: <input type="password" name="passRegist" required></p>
            <p>DNI: <input type="text" name="dniRegist" placeholder="dni" required></p>
            <p>Teléfono: <input type="text" name="tfnoRegist" required></p>            
            <input type="submit" name="submRegist" value="Aceptar"> 
        </form>
    </body>
</html>
