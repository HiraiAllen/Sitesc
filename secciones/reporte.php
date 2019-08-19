<?php
session_start();
require "../conexion.php";

$tipo_usuario = $_SESSION['tipo_usuario'];

//Query para los maestros
$query_maestros = 'SELECT * FROM maestros';
$resultado_maestros = mysqli_query($connect, $query_maestros);


//Query para tipo de reporte
$query_tipo_reporte = 'SELECT * FROM tiporep';
$resultado_tipo_reporte = mysqli_query($connect, $query_tipo_reporte);


if(isset($_POST["btn_agregar"]))
{
    //Query estudiantes / Validación
    $nombre = $_POST["nombre"];
    $query_estudiantes = "SELECT nombre FROM asistencia WHERE '".$nombre."';";
    $resultado_estudiantes = mysqli_query($connect, $query_estudiantes);
    //Compruebo que el nombre del estudiante exista en la tabla para poder enviar los datos
    //correctamente.
    if($resultado_estudiantes != NULL)
    {
        $date = date('Y-m-d');
        $grupo = $_POST["grupo"];
        $tipo = $_POST["tipo"];
        $profesor = $_POST["maestro"];
        $dias_justificados = $_POST["dias-justificados"];
        $domiciliaria = $_POST["visita-dom"];
        $observaciones = $_POST["observaciones"];
        $citatorio = $_POST["citatorio"];

        $insertar_estudiante = 'INSERT INTO reportes(`fecha`, `grupo`, `maestro`, `nombre`, `reporte`, `com`, `cita`, `observ`, `dias`) 
                                VALUES("'.$date.'", "'.$grupo.'","'.$profesor.';", "'.$nombre.'", "'.$tipo.'", "'.$domiciliaria.'",
                                "'.$citatorio.'", "'.$observaciones.'", "'.$dias_justificados.'")';
        $result_ins_estudiante = mysqli_query($connect,$insertar_estudiante);
        if($result_ins_estudiante)
        {
            echo "<script>alert('reporte capturado');</script>";
        }
    }else{
        echo "El estudiante no existe";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="reporte.css">
    <link rel="stylesheet" href="../navbar.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/96b6886ff5.js"></script>
    <title>Generar Reportes</title>
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

        <!--Formulario generador de reportes-->
        <form action="reporte.php" class="gen-reporte" method="POST">
            <label for="nombre" class="label-form">Nombre del estudiante</label>
            <input type="text" id="nombre" class="inp-form" name="nombre">
            
            <label for="grupo" class="label-form">Grupo</label>
            <select name="grupo" id="grupo" class="select-rep">
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

            <label for="tipo" class="label-form">Tipo</label>
            <select name="tipo" id="tipo" class="select-rep">
            <?php foreach($resultado_tipo_reporte as $key => $tipo_reporte): ?>
                <option value="<?php echo utf8_encode($tipo_reporte["reporte"]);?>">
                <?php echo utf8_encode($tipo_reporte["reporte"]);  ?></option>
            <?php endforeach;?>
            </select>

            <label for="maestro" class="label-form">Maestro</label>
            <select name="maestro" id="maestro" class="select-rep">
            <?php foreach ($resultado_maestros as $key => $maestro): ?>
                <option value="<?php echo utf8_encode($maestro["maestro"]);?>">
                <?php echo utf8_encode($maestro["maestro"]);  ?></option>
            <?php endforeach; ?>
            </select>

            <label for="dias-justificados" class="label-form">Dias justificados</label>
            <input type="text" id="dias-justificados" class="inp-form" name="dias-justificados">

            <label for="visita-dom" class="label-form">Visita domiciliaria</label>
            <input type="text" id="visita-dom" class="inp-form" name="visita-dom">
            
            <label for="observaciones" class="label-form">Observaciones</label>
            <input type="text" id="observaciones" class="inp-form" name="observaciones">

            <label for="citatorio" class="label-form">Citatorio</label>
            
            <input type="date" name="citatorio" class="select-rep">

            <input type="submit" value="Agregar" name="btn_agregar" class="btn-send">
        </form>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

    <script src="../submenu.js"></script>
</body>
</html>