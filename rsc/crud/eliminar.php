<?php
include_once '../config.php';

// Create connection - OOP
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection - OOP
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$id_comentario = $_POST['id_comentario'];
$sql = "DELETE FROM comentarios WHERE id='$id_comentario'";

$result = $con->query($sql);

$response = array();

if ($result) {
    $response['success'] = "exito";
    exit(json_encode($response));
} else {
    $response['error'] = "error";
    exit(json_encode($response));
}

?>