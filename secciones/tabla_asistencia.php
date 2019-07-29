<?php
require "../conexion.php";
$read = 'SELECT * FROM asistencia WHERE grupo = "'.$_POST["query"].'";';
$result = mysqli_query($connect, $read);
?>

<!--Tabla de asistencia-->



<thead class="table-head">
    <tr>
        <th class="table-data">Nombre del alumno </th>
        <th class="table-data">Asistencia</th>
    </tr>
</thead>

<tbody class="table-body">
<?php foreach($result as $key => $value): ?>
    <tr>
        <td class="table-data">
            <?php echo utf8_encode($value["nombre"]);?>
        </td>
        <td class="table-data">
            <input type="radio" class="radio-btn" id="radio-btn">
            <label for="radio-btn" class="label-radio">NO/A </label>
            <input type="radio" hidden> <!--Input del SI asistió-->
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
