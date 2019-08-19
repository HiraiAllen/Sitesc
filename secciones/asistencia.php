<?php
session_start();
require "../conexion.php";
$tipo_usuario = $_SESSION['tipo_usuario'];
error_reporting(1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asistencia.css">
    <link rel="stylesheet" href="../navbar.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/96b6886ff5.js"></script>
    <title>Pase de asistencia</title>
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
        
        <div class="title-and-select">
            <h2 class="selecciona">Seleccione un grupo</h2>
            
            <form action="asistencia.php" method="post" id="formulario" class="form-as">
                <select name="" class="grupos" id="grupos">
                    <option value="1A">1A</option>
                    <option value="1B">1B</option>
                    <option value="1C">1C</option>
                    <option value="1D">1D</option>
                    <option value="2A">2A</option>
                    <option value="2B">2B</option>
                    <option value="2C">2C</option>
                    <option value="2D">2D</option>
                    <option value="3A">3A</option>
                    <option value="3B">3B</option>
                    <option value="3C">3C</option>
                    <option value="3D">3D</option>
                </select>

                <input type="hidden" name="grupo_seleccionado" id="grupo_seleccionado">
                <!--<input type="submit" class="show-data" value="Mostrar alumnos" name="btn" id="btn"> -->
            </form>
        </div>
        
        <table class="asistencia" id="asistencia">
            <?php include "tabla_asistencia.php"; ?>
        </table>
    </div>

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

    <script src="../submenu.js"></script>
    <script src="ajax.js"></script>
</body>
</html>