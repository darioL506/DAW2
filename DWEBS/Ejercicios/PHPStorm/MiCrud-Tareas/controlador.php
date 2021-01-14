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
    $aux = $_SESSION['NewTarRedirect'];
    header('Location: '.$_SESSION['NewTarRedirect']);
}
