<?php
// if(!isset($_SESSION['admin'])){
//     header("Location: ../../views/login/login.php");
// }


function ad60(){
    if($_SESSION['admin'] == 1){
        echo '<button class="btn danger" id="eliminarData" onclick="readDataButton()">Eliminar</button>';
    }
}
?>