<?php

include_once '../config.php';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['email']) && isset($_POST['nombre']) && isset($_POST['contraseña'])) {
    // VARIABLES
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];
    $contraseña2 = $_POST['contraseña2'];

    // VALIDATION
    if ($email == "" || $nombre == "" || $contraseña == "" || $contraseña2 == "") {
        $response['error'] = "notParametros";
        exit(json_encode($response));
    }

    if (strlen($nombre) < 2){
        $response['error'] = "user-name<2";
        exit(json_encode($response));
    }

    if (strlen($contraseña) < 6){
        $response['error'] = "user-pass<6";
        exit(json_encode($response));
    }

    // CONSULTA 1
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response['error'] = "error-email";
        exit(json_encode($response));
    }
    // CONSULTA 2
    $sql = "SELECT * FROM users WHERE nombre='$nombre'";
    $result2 = $conn->query($sql);

    if ($result2->num_rows > 0) {
        $response2['error'] = "error-nombre";
        exit(json_encode($response2));
    }

    // CONSULTA 3
    $response3 = array();
    if ($contraseña == $contraseña2) {
        $contHash = hash('sha512', $contraseña2);
        $sql = "INSERT INTO users (nombre, email, contrasenha) VALUES ('$nombre', '$email', '$contHash')";
        $result3 = $conn->query($sql);

        if ($result3) {
            $response3['success'] = "Se enviaron bien los datos";
            exit(json_encode($response3));
        }
    } else {
        $response3['error'] = "error-contraseña";
        exit(json_encode($response3));
    }
}
$conn->close();
