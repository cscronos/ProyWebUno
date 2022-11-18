<?php
    if(isset($_POST["enviar"])) {
        session_start();

        $_SESSION["usuario"] = htmlentities($_POST["usuario"]);
        $_SESSION["contraseña"] = htmlentities($_POST["contraseña"]);

        header("Location: ../index/index.php");
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
        <form action="" method="post">
            <input type="text" name="usuario" id="" placeholder="usuario...">
            <input type="password" name="contraseña" id="" placeholder="contraseña...">
            <input type="submit" name="enviar" value="login">
        </form>
    </div>
</body>
</html>