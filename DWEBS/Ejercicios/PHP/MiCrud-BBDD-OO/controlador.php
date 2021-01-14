<?php
require_once 'GestionDatos.php';

if(isset($_REQUEST['borrarCrud'])) {
    GestionDatos::newConexion();
    $dni = $_REQUEST['dni'];
    GestionDatos::deletePersonas($dni);
    GestionDatos::cerrarConexion();
    header('Location: Vistas/admin.php');
}

if(isset($_REQUEST['editarCrud'])) {
    GestionDatos::newConexion();    
    GestionDatos::editPersonas($_REQUEST['dni'],$_REQUEST['nombre'],$_REQUEST['tfno']);
    GestionDatos::cerrarConexion();
    header('Location: Vistas/admin.php');
}

if(isset($_REQUEST['admin'])){
    header('Location: Vistas/admin.php');
}

if(isset($_REQUEST['submLog'])) {
    GestionDatos::newConexion();
    $nombre = $_REQUEST['nameLog'];
    $pass = $_REQUEST['passLog'];
    $entra = GestionDatos::inicioSesion($nombre, $pass);
    GestionDatos::cerrarConexion();
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
    GestionDatos::newConexion();
    $dni = $_REQUEST['dniRegist'];
    $nombre = $_REQUEST['nameRegist'];
    $pass = $_REQUEST['passRegist'];
    $tfno = $_REQUEST['tfnoRegist'];
    GestionDatos::insertPersonas($dni, $nombre, $pass, $tfno);
    GestionDatos::cerrarConexion();
    header('Location: index.php');
}
