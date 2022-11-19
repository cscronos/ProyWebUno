<?php

include_once '../config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$nombre = $_SESSION['usuario'];
$mensaje = $_POST['mensaje'];
$sql = "INSERT INTO comentarios (user, mensaje) VALUES ('$nombre', '$mensaje')";
$result = $conn->query($sql);

$response = array();

if ($result) {
    $response['success'] = "Se enviaron bien los datos";
    exit(json_encode($response));
} else {
    $response['error'] = "error";
    exit(json_encode($response));
}

$conn->close();