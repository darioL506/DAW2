<?php

//echo $_POST['id'];

$dbserver = "172.20.0.2:3306";
$dbuser = "dario";
$password = "Chubaca2020";
$dbname = "ejemplo";

$database = new mysqli($dbserver, $dbuser, $password, $dbname);
    
$jsondata = array();

$consulta = "SELECT * FROM libros WHERE tipo = '" . $_POST['genero'] . "'";
if ($result = $database->query($consulta)) {
    if ($result->num_rows > 0) {
        $jsondata["success"] = true;
        $jsondata["data"]["message"] = sprintf("Se han encontrado %d libros", $result->num_rows);
        $jsondata["data"]["nombre"] = array();
        while ($row = $result->fetch_object()) {
            $jsondata["data"]["nombre"][] = $row;
        }
    } else {
        $jsondata["success"] = false;
        $jsondata["data"] = array(
            'message' => 'No se encontró ningún resultado.'
        );
    }
} else {

    $jsondata["success"] = false;
    $jsondata["data"] = array(
        'message' => $database->error
    );
}

$database->close();

header("Content-Type: application/json", true);
echo json_encode($jsondata, JSON_FORCE_OBJECT);
