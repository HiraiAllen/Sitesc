<?php
session_start();

$usuario = $_SESSION['usuario'];
$tipo_usuario = $_SESSION['tipo_usuario'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="../navbar.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/96b6886ff5.js"></script>
    <title>Sitesc</title>
</head>
<body>
    <div class="main">
        <!--Navbar-->
        <div class="navbar-main">
            <div class="bar-btn" id="sub-menu-btn">
                <i class="fas fa-bars" id="bar-icon"></i>
            </div>
        </div>
        <!--Submenu-->
        <div class="submenu" id="submenu"> 
            <a href="home.php" class="submenu-item">Inicio</a>
            <a href="asistencia.php" class="submenu-item">Pase de asistencia</a>
            <a href="reporte.php" class="submenu-item">Generar Reportes</a>
            <?php if($tipo_usuario != "Prefecto" && $tipo_usuario != "Profesor"): ?>
                <a href="admin.php" class="submenu-item">Administracion</a>
            <?php endif; ?>
            <a href="../cerrar_sesion.php" class="submenu-item">Cerrar sesión</a>
        </div>

        <!--Menu escritorio-->
        <div class="menu-escritorio">
            <div class="items-container">
                <a href="home.php" class="escritorio-item">Inicio</a>
                <a href="asistencia.php" class="escritorio-item">Pase de asistencia</a>
                <a href="reporte.php" class="escritorio-item">Generar Reportes</a>
                <?php if($tipo_usuario != "Prefecto" && $tipo_usuario != "Profesor"): ?>
                    <a href="admin.php" class="escritorio-item">Administracion</a>
                <?php endif; ?>
                <a href="../cerrar_sesion.php" class="escritorio-item">Cerrar sesión</a>
            </div>
        </div>
        <!--
        <div class="titular">
            <h3 class="titular-items">Usuario: <?php echo $usuario; ?></h3>
            <h3 class="titular-items">Tipo de usuario: <?php echo $tipo_usuario; ?></h3>
        </div>
        -->
        <!--Botones demas opciones-->
        <div class="buttons">
            <a href="asistencia.php" class="btn-items"> <i class="fas fa-user-friends"></i> Pase de asistencia</a>
            <a href="reporte.php" class="btn-items"> <i class="fas fa-book"></i> Generar Reportes</a>
            <?php if($tipo_usuario != "Prefecto" && $tipo_usuario != "Profesor"): ?>
                <a href="admin.php" class="btn-items"><i class="fas fa-user-cog"></i> Administracion</a>
            <?php endif; ?>
        </div>
    </div>

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="../submenu.js"></script>
</body>
</html>