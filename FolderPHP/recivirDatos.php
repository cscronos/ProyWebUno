<?php

// traemos los datos de conexion
include_once '../config.php';

// Create connection - OOP
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection - OOP
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Traemos datos de la tabla
$sql = "SELECT * FROM TwoTest";
$result = $conn->query($sql);

$array = array();

// verificamos si tiene filas sino no trae resultados
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $array[] = $row;
    }
    exit(json_encode($array));
} else {
  echo "0 results";
}

$conn->close();
