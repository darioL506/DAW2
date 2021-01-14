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
        ?>
        <form name="form1" action="validar.php">
            
            <label>Nombre</label>
            <input type="text" name="name" value="Nombre">
            <input type="text" name="lastName" value="Apellido">
            <br>
            
            <label>Contraseña</label>
            <input type="password" name="password" value="">
            <br>
            
            <label>Edad</label>
            <input type="text" name="edad" value="">
            <br>
            
            <label>Sexo</label>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Hombre</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Mujer</label><br>
            
            <label>Fecha</label>
            <input type="date" name="fecha">
            <br>
            
            <!--<label>Asignaturas</label>
            <input type="checkbox" name="dwc" value="dwc">
            <label for="dwc"> Desarrollo Web Cliente</label>
            <input type="checkbox" name="dws" value="dws">
            <label for="dws"> Desarrollo Web Servidor</label>
            <input type="checkbox" name="di" value="di">
            <label for="di"> Desarrollo de Interfaces</label>
            <br>-->
            
            <label>Curso</label>
            <select name="curso">
                <option value="daw">DAW</option>
                <option value="dam">DAM</option>
            </select>
            <br>
            
            <input type="submit" name="registOk" value="Registrar">
        </form>
    </body>
</html>
