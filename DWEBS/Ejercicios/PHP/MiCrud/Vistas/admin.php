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
        <h1>Administrador</h1>
        <?php
        require_once '../GestionDatos.php';
        require_once '../controlador.php';
        GestionDatos::newConexion();
        $resultado = GestionDatos::consulta("SELECT * FROM personas");      
        while ($fila = mysqli_fetch_array($resultado)) {        
            echo '<form id="crud" method="POST" action="../controlador.php">';
            echo '<input type="text" name="dni" value="'.$fila["DNI"].'" readonly>';
            echo '<input type="text" name="nombre" value="'.$fila["Nombre"].'">';
            echo '<input type="text" name="tfno" value="'.$fila["Tfno"].'">';
            echo '<input type="submit" name="borrarCrud" value="Borrar">';
            echo '<input type="submit" name="editarCrud" value="Editar">';
            echo '</form>';
        }
        GestionDatos::cerrarConexion();
        ?>
    </body>
</html>
