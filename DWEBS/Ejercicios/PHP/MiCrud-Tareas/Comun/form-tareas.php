
<h1>Nueva tarea</h1>
<form name="form-tar" action="../controlador.php">
    <p>Tarea: <input type="text" name="tarea" placeholder="Tarea" required></p>
    <p>Descripcion: </p>
    <textarea rows="4" name="descr" required></textarea>
    <p>Nivel: 
        <select name="nivel">
            <option value="facil">Facil</option>
            <option value="normal">Normal</option>
            <option value="dificil">Dificil</option>            
        </select>
    </p>             
    <input type="submit" name="submNTar" value="Aceptar"> 
</form>
<?php
session_start();
$_SESSION['NewTarRedirect'] = $_SERVER['REQUEST_URI'];
?>