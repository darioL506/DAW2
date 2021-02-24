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
    var_dump($response);
    curl_close($ch);
    $respuesta = json_decode($response, true);
    var_dump($respuesta['status']);
    if ($respuesta['status'] != 200) {
        echo $respuesta['message'];
    } else {
        echo 'Login realizado'.'<br>';

        //Haciendo una petición GET: para obtener un artículo concreto.
        $ch = curl_init("http://localhost:8090/getUsers");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $header = array(
            'Authorization: ' . $respuesta['accessToken']
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($ch);
        curl_close($ch);
        var_dump($result);
        $respuesta = json_decode($result, true);
        var_dump($respuesta);
        if ($respuesta['status'] != 200) {
            echo 'Algo ha salido mal: '.$respuesta['message'];
        } else {            
            $_SESSION['usuarios'] = $respuesta['data'];
            header('Location: crud.php');
        }
    }
}