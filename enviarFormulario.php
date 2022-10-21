<?php

// Traemos los datos
include_once 'config.php';

// Create connection - OOP
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection - OOP
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//get form data
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];


//insert form data into database
$sql = "INSERT INTO TwoTest (nombre, apellido, email, mensaje) VALUES ('$nombre','$apellido', '$email', '$mensaje')";
$result = $conn->query($sql);

// array vacia
$response = array();

if ($result) {
    $response['success'] = "Se enviaron bien los datos";
    exit(json_encode($response));
} else {
    $response['error'] = "error" . $conn->error;
    exit(json_encode($response));
}

$conn->close();
