<?php

include_once '../config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nombreNew = $_POST['nombreNew'];
$idcomentario = $_POST['id'];

$sql = "UPDATE TwoTest SET nombre = '$nombreNew' WHERE id = '$idcomentario'";

$result = $conn->query($sql);

// close conection
$conn->close();

