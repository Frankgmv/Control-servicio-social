<?php

include_once "../../../Modelo/conexion_db.php";

// Vector con los datos base del estudiante.
$datosEstudiante = $_SESSION['vector'];

$connN = $conn;
// Mostrar tareas disponibles.
$SQL =  "SELECT * FROM TAREAS;";
$result3 = mysqli_query($conn, $SQL);
$num = mysqli_num_rows($result3);

$SQL2 = "SELECT COUNT(ESTADO_TAREA) as Activas FROM TAREAS WHERE ESTADO_TAREA LIKE \"A%\";";
$result4 = mysqli_query($conn, $SQL2);
$ConteoDeActivas = mysqli_fetch_array($result4);
// $num = mysqli_num_rows($);

?>
