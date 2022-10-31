<?php

include_once '../config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
$contraseña2 = $_POST['contraseña2'];
if ($contraseña == $contraseña2) {
    $sql = "INSERT INTO users (nombre, email, contrasenha) VALUES ('$nombre', '$email', '$contraseña2')";
    $result = $conn->query($sql);

    $response = array();

    if ($result) {
        $response['success'] = "Se enviaron bien los datos";
        exit(json_encode($response));
    } else {
        $response['error'] = "error" . $conn->error;
        exit(json_encode($response));
    }
}



$conn->close();
