<?php
require "conexion.php";
session_start();


if(isset($_POST['usuario']) && isset($_POST['password'])){
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    $query = "SELECT * FROM usuarios WHERE usuario = '".$usuario."' and password = '".$password."';";
    $result = mysqli_query($connect, $query);
    $array_cons = mysqli_fetch_array($result, MYSQLI_ASSOC);
}

if(isset($array_cons))
{
    $_SESSION['usuario'] = $usuario;
    $_SESSION['tipo_usuario'] = $array_cons["tipo_usuario"];
    header("location: secciones/home.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/96b6886ff5.js"></script>
    <title>Inicio de sesión</title>
</head>
<body>
    <div class="main">
        <!--Header-->
        <header class="header">
            <h1 class="title-header">Bienvenido a Sitesc</h1>
        </header>

        <!--Formulario del login-->
        <form action="index.php" class="login" method="post">
            <h2 class="title-login">Inicio de sesión</h2>
            <label for="usuario" class="label-login"><i class="fas fa-user"></i> Usuario</label>
            <input type="text" id="usuario" name="usuario" class="login-inp">

            <label for="password" class="label-login"><i class="fas fa-key"></i> Contraseña</label>
            <input type="password" name="password" id="password" class="login-inp">

            <input type="submit" value="Iniciar" class="btn-login">
        </form>

        <?php if($array_cons == NULL && $usuario != NULL && $password != NULL): ?>
            <p class="error-msj">Datos incorrectos.</p>    
        <?php endif; ?>
    </div>

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

</body>
</html>