<?php
    if(isset($_POST["usuario"])) {
        session_start();
        $_SESSION["usuario"] = $_POST["usuario"];
        $_SESSION["contraseña"] = htmlentities($_POST["contraseña"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones</title>
    <link rel="stylesheet" href="../../css/style_login.css">
</head>
<body>
    <div class="flex">
        <h1>Login</h1>
        <form action="" method="post" id="form-login">
            <input type="text" name="usuario" placeholder="usuario...">
            <input type="password" name="contraseña" placeholder="contraseña...">
            <input type="submit" name="enviar" value="login">
        </form>
    </div>
    <div id="respuesta"></div>
    <script src="../../js/form-login.js"></script>
</body>
</html>