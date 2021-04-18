<?php
session_start();
if (isset($_REQUEST['login'])) {
    $data = [
        'dni' => $_REQUEST['dni'],
        'password' => $_REQUEST['password']
    ];
    $ch = curl_init("http://localhost:8090/login");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $response = curl_exec($ch);    
    curl_close($ch);
    $respuesta = json_decode($response, true);
    var_dump($respuesta['status']);
    if ($respuesta['status'] != 200) {
        echo $respuesta['message'];
    } else {        
        
        $ch = curl_init("http://localhost:8090/getUsers");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $header = array(
            'Authorization: ' . $respuesta['accessToken']
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($ch);
        curl_close($ch);        
        $respuesta = json_decode($result, true);        
        if ($respuesta['status'] != 200) {
            echo 'Error: '.$respuesta['message'];
        } else {
            $_SESSION['header'] = $header;
            $_SESSION['usuarios'] = $respuesta['data'];
            header('Location: crud.php');
        }
    }
}

if (isset($_REQUEST['editar'])) {
    $data = [        
        'name' => $_REQUEST['name'],
        'dni' => $_REQUEST['dni']
    ];
    var_dump($data);
    $url = "http://localhost:8090/crudUpdate";    
    echo $url.' <br>';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    $header = $_SESSION['header'];
    var_dump($header);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $result = curl_exec($ch);
    var_dump($result);
    curl_close($ch);        
    $respuesta = json_decode($result, true);
    if ($respuesta['status'] != 200) {
        echo 'Error: '.$respuesta['message'];        
    } else {
        $ch = curl_init("http://localhost:8090/getUsers");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($ch);
        curl_close($ch);        
        $respuesta = json_decode($result, true);        
        if ($respuesta['status'] != 200) {
            echo 'Error: '.$respuesta['message'];
        } else {            
            $_SESSION['usuarios'] = $respuesta['data'];
            header('Location: crud.php');
        }
    }
}

if (isset($_REQUEST['borrar'])) {
    $data = [                
        'dni' => $_REQUEST['dni']
    ];
    var_dump($data);
    $url = "http://localhost:8090/crudDelete";    
    echo $url.' <br>';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    $header = $_SESSION['header'];
    var_dump($header);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $result = curl_exec($ch);
    var_dump($result);
    curl_close($ch);        
    $respuesta = json_decode($result, true);
    if ($respuesta['status'] != 200) {
        echo 'Error: '.$respuesta['message'];        
    } else {
        $ch = curl_init("http://localhost:8090/getUsers");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($ch);
        curl_close($ch);        
        $respuesta = json_decode($result, true);        
        if ($respuesta['status'] != 200) {
            echo 'Error: '.$respuesta['message'];
        } else {            
            $_SESSION['usuarios'] = $respuesta['data'];
            header('Location: crud.php');
        }
    }
}