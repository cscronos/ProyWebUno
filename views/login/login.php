<?php
    session_start();

    $nombre = $_SESSION["usuario"];
    $password = $_SESSION["contraseña"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones</title>
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <div>
        <h2 style="color: white">Bienvenido <?php $nombre; ?></h2>
        <form action="" method="post">
            <input type="text" name="nombre" id="" placeholder="nombre...">
            <input type="text" name="contraseña" id="" placeholder="contraseña...">
            <input type="submit" value="login">
        </form>
    </div>
</body>
</html>