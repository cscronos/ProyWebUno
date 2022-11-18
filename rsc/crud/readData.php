<?php

include_once 'config.php';

// Create connection - OOP
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection - OOP
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM TwoTest";

$result = $con->query($sql);

$array = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
}

exit (json_encode($array));
?>