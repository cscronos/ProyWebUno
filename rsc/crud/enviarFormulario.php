<?php

include_once 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

$sql = "INSERT INTO TwoTest (nombre, apellido, email, mensaje) VALUES ('$nombre','$apellido', '$email', '$mensaje')";
$result = $conn->query($sql);

$response = array();

if ($result) {
    $response['success'] = "Se enviaron bien los datos";
    exit(json_encode($response));
} else {
    $response['error'] = "error" . $conn->error;
    exit(json_encode($response));
}

$conn->close();