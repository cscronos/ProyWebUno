<?php

session_start();
include_once '../config.php';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// ADMIN?

if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {

    // VARIABLES
    $nombre = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $sql0 = "SELECT * FROM admins WHERE user_admin='$nombre'";
    $result0 = $conn->query($sql0);
    
    // ADMIN??
    if ($result0->num_rows > 0){
        $_SESSION['admin'] = 1;
    } else {
        $_SESSION['admin'] = 0;
    }
    
    // INPUT NULL??
    if ($nombre == "" || $contraseña == "") {
        $response['error'] = "user-notParametros";
        exit(json_encode($response));
    }
    
    $sql = "SELECT * FROM users WHERE nombre='$nombre'";
    $result = $conn->query($sql);

    // USER ??
    if ($result->num_rows == 0) {
        $response['error'] = "user-notfound";
        exit(json_encode($response));
    }

    // CONSULTA 2
    $sql2 = "SELECT contrasenha FROM users WHERE nombre='$nombre';";
    $result2 = $conn->query($sql2);

    $fila2 = mysqli_fetch_object($result2);

    if (hash('sha512', $contraseña) != $fila2->contrasenha) {
        $response2['error'] = "pass-error";
        exit(json_encode($response2));
    } else {
        $response2['success'] = "Correcto";
        $_SESSION['usuario'] = $nombre;
        exit(json_encode($response2));
    }
}


$conn->close();
