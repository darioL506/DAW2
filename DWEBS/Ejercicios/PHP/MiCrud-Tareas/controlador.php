<?php
require_once 'GestionDatos.php';

if(isset($_REQUEST['borrarCrud'])) {    
    $dni = $_REQUEST['dni'];
    GestionDatos::deletePersonas($dni);   
    header('Location: Vistas/admin.php');
}

if(isset($_REQUEST['editarCrud'])) {    
    GestionDatos::editPersonas($_REQUEST['dni'],$_REQUEST['nombre'],$_REQUEST['tfno']);    
    header('Location: Vistas/admin.php');
}

if(isset($_REQUEST['admin'])){
    header('Location: Vistas/admin.php');
}

if(isset($_REQUEST['submLog'])) {    
    $nombre = $_REQUEST['nameLog'];
    $pass = $_REQUEST['passLog'];
    $entra = GestionDatos::inicioSesion($nombre, $pass);    
    if($entra) {
        session_start();
        $resultado = GestionDatos::consulta('SELECT DNI FROM personas WHERE Nombre ="'.$nombre.'" AND Clave = "'.$pass.'"');
        $fila = $resultado->fetch_assoc();
        $_SESSION['dniAct'] = $fila["DNI"];
        header('Location: Vistas/inicio.php');
    } else {
        header('Location: index.php');
    }
}

if(isset($_REQUEST['regist'])) {
    header('Location: Vistas/registro.php');
}

if(isset($_REQUEST['submRegist'])) {    
    $dni = $_REQUEST['dniRegist'];
    $nombre = $_REQUEST['nameRegist'];
    $pass = $_REQUEST['passRegist'];
    $tfno = $_REQUEST['tfnoRegist'];
    GestionDatos::insertPersonas($dni, $nombre, $pass, $tfno);    
    header('Location: index.php');
}

if(isset($_REQUEST['submNTar'])) {
    session_start();
    GestionDatos::newTarea($_REQUEST['tarea'], $_REQUEST['descr'], $_REQUEST['nivel']);    
    header('Location: '.$_SESSION['NewTarRedirect']);
}

if(isset($_REQUEST['partTarea'])) {
    session_start();    
    GestionDatos::addToTarea($_SESSION['dniAct'], $_REQUEST['id']);
    header('Location: Vistas/inicio.php');
}

if(isset($_REQUEST['editarTarea'])) {
    $aux = str_replace('%', '', $_REQUEST['porcDes']);
    GestionDatos::editTarea($_REQUEST['tarea'], $_REQUEST['descr'], $aux, $_REQUEST['nivel'], $_REQUEST['id']);
    header('Location: Vistas/inicio.php');
}
