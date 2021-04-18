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
            session_start();
            $usuarios = $_SESSION['usuarios'];
            foreach ($usuarios as $usuario) {
        ?>
        <form action="controller.php" method="POST">
            Nombre:<input name="name" value="<?=$usuario['nombre']?>">
            <input type="hidden" name="dni" value="<?=$usuario['dni']?>">
            <input type="submit" name="editar" value="Editar">
            <input type="submit" name="borrar" value="Borrar">
        </form>
        <?php
            }
        ?>
    </body>
</html>
