<?php

include_once '../config.php';

// Create connection - OOP
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection - OOP
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
session_start();
$user_ses = $_SESSION['usuario'];
$sql = "SELECT * FROM comentarios WHERE user='$user_ses'";

$result = $con->query($sql);

$array = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
}

exit (json_encode($array));
?>