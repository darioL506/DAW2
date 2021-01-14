<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_REQUEST['cerca'])) {    
    session_start();
    $_SESSION['move']=true;
    header('Location: index.php');
}

if(isset($_REQUEST['mosca'])) {
    header('Location: victoria.php');
}

