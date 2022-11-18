<?php

include_once '../config.php';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// VARIABLES
$email = $_POST['email'];
$nombre = $_POST['nombre'];
$contraseña = $_POST['contraseña'];
$contraseña2 = $_POST['contraseña2'];

// CONSULTA 1
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $response['error'] = "error-email" . $conn->error;
    exit(json_encode($response));
}
// CONSULTA 2
$sql = "SELECT * FROM users WHERE nombre='$nombre'";
$result2 = $conn->query($sql);

if ($result2->num_rows > 0) {
    $response2['error'] = "error-nombre" . $conn->error;
    exit(json_encode($response2));
}

// CONSULTA 3
$response3 = array();
if ($contraseña == $contraseña2) {
    $sql = "INSERT INTO users (nombre, email, contrasenha) VALUES ('$nombre', '$email', '$contraseña2')";
    $result3 = $conn->query($sql);

    if ($result3) {
        $response3['success'] = "Se enviaron bien los datos";
        exit(json_encode($response3));
    }
} else {
    $response3['error'] = "error-contraseña" . $conn->error;
    exit(json_encode($response3));
}

$conn->close();
