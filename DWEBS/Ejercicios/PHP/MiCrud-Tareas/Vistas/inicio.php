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
        <h1>Inicio</h1>
        <?php
        require_once '../GestionDatos.php';
        require_once '../controlador.php';
        session_start();
        echo $_SESSION['dniAct'];
        ?>
        <form>
            <input type="text" value="Tarea" readonly>
            <input type="text" value="Descripcion" readonly>
            <input type="text" value="Porcentaje finalizado" readonly>
            <input type="text" value="Dificultad" readonly>
        </form>
        <?php
        $resultado = GestionDatos::getAllTareas();      
        while ($fila = $resultado->fetch_assoc()) {
            $tiene = GestionDatos::isInTarea($_SESSION['dniAct'], $fila['id']);
            echo '<form id="crud" action="../controlador.php">';
            echo '<input type="text" name="id" value="'.$fila["id"].'" style="display:none">';
            echo '<input type="text" name="tarea" value="'.$fila["tarea"].'" readonly>';
            echo '<input type="text" name="descr" value="'.$fila["descripcion"].'" readonly>';            
            if($tiene) {
                echo '<input type="text" name="porcDes" value="'.$fila["porcDes"].'%" >';
            } else {
                echo '<input type="text" name="porcDes" value="'.$fila["porcDes"].'%" readonly>';
            }
            echo '<input type="text" name="nivel" value="'.$fila["nivel"].'" readonly>';
            if($tiene) {
                echo '<input type="submit" name="editarTarea" value="Editar">';
            } else {
                echo '<input type="submit" name="partTarea" value="Participar">';
            }
            echo '</form>';
        }  
        ?>
    </body>
</html>
