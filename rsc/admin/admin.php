<?php

function ad60(){
    if($_SESSION['admin'] == 1){
        echo '<button onclick="llamarDatos()">Ver Datos</button>';
    }
}

?>