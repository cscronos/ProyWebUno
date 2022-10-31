<?php

include_once '../config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$idcomentario = $_POST['id'];

$sql = "DELETE FROM TwoTest WHERE id = '$idcomentario' ";
$result = $conn->query($sql);

$conn->close();
