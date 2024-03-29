<?php 
session_start();

$tipo_usuario = $_SESSION['tipo_usuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../navbar.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/96b6886ff5.js"></script>
    <title>Administracion</title>
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
            <a href="admin.php" class="submenu-item">Administracion</a>
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
        <!--Titulo y selección-->
        <div class="title-and-select">
            <h2 class="selecciona">Seleccione un grupo</h2>
            <select name="" class="grupos">
                    <option value="1B">1A</option>
                    <option value="1A">1B</option>
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
        </div>
        <!--Primera tabla-->
        <table class="tabla-admin" id="tabla-uno">
            <thead class="head-admin">
                <tr>
                    <th class="data">No. Lista </th>
                    <th class="data">Nombre del alumno</th>
                    <th class="data">Accion</th>
                </tr>
            </thead>

            <tbody class="body-admin">
                <tr class="info-admin">
                    <td class="id-admin">1</td>
                    <td class="field-admin"> <a href="#" class="name-tb" id="link-est"> MAURICIO HERNANDEZ SANCHEZ</a></td>
                    <td class="field-admin">
                        <button class="btn-baja">Baja</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!--Demas tablas-->
        <div class="sub-tablas-rep" id="sub-tablas">
            <a href="#" class="boton-atras" id="regresar-btn"><i class="fas fa-arrow-circle-left"></i> Volver a la tabla de estudiantes</a>
            <h2 style="margin: 5px 0;">Historial del alumno</h2>
            <h3 style="margin: 5px 0;">Numero de inasistencias: 0</h3>
            <!--Segunda tabla-->
            <table class="info-reporte">
                <thead class="head-admin">
                    <tr>
                        <th class="data">Nombre del estudiante</th>
                        <th class="data">Fecha de inasistencia</th>
                        <th class="data">Grupo</th>
                        <th class="data">Maestro</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="field-admin">Mauricio Hernandez</td>
                        <td class="field-admin">05/06/2019</td>
                        <td class="field-admin">1B</td>
                        <td class="field-admin">Teodoro Garcia</td>
                    </tr>
                </tbody>
            </table>

            <!--Tercera tabla-->
            <table class="info-reporte">
                <thead class="head-admin">
                    <tr>
                        <th class="data">Id reporte</th>
                        <th class="data">Marca Temporal</th>
                        <th class="data">Reporte</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="field-admin">81721</td>
                        <td class="field-admin">9ISDA23</td>
                        <td class="field-admin">Falta de asistencia</td>
                    </tr>
                </tbody>
            </table>
            <!--Cuarta tabla-->
            <table class="info-reporte">
                <thead class="head-admin">
                    <tr>
                        <th class="data">Dias justificados</th>
                        <th class="data">Visita domiciliaria</th>
                        <th class="data">Citatorio</th>
                    </tr>
                </thead>

                <tbody>
                    
                    <tr>
                        <td class="field-admin">Ninguno</td>
                        <td class="field-admin">Texto</td>
                        <td class="field-admin">Ni idea</td>
                    </tr>
                   
                </tbody>
            </table>

            <div class="observaciones">
                <div class="obs-title">Observaciones</div>
                <div class="obs-campo">El estudiante se subió a la mesa a hacer bailes
                    del fortnite.
                </div>
            </div>
            <br>
            <br>
            <br>
        </div>

    </div>

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    
    <script src="../submenu.js"></script>
    <script src="admin.js"></script>
</body>
</html>