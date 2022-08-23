<?php



include_once "../../../Modelo/conexion_db.php";

// Vector con los datos base del estudiante.
$datosEstudiante = $_SESSION['vector'];
$id = $datosEstudiante['IDENTIDAD'];

// CONEXIÓN HABILITADA PARA EL DOCUMENTO DE TAREAS Y ESTUDIANTES.
$connN = $conn;

// Seleccionar tareas ACTIVAS.
// $SQL =  "SELECT * FROM TAREAS WHERE ESTADO_TAREA LIKE \"A%\" OR \"T%\" ;";
$SQL =  "SELECT * FROM TAREAS ORDER BY  ESTADO_TAREA  ;";
$result3 = mysqli_query($conn, $SQL);
$num = mysqli_num_rows($result3);

// CONTEO DE TAREAS ACTIVAS.
$SQL2 = "SELECT COUNT(ESTADO_TAREA) as Activas FROM TAREAS WHERE ESTADO_TAREA LIKE \"A%\";";
$result4 = mysqli_query($conn, $SQL2);
$ConteoDeActivas = mysqli_fetch_array($result4);

//TODO total de horas que lleva el estudiante.


//Tareas a las cuales esta postulado.
$SQL5 = "SELECT * FROM POSTULADOS WHERE ID_POSTULADO = '$id';";
$result5 = mysqli_query($conn, $SQL5);

// conteo de las que pertenezco y están activas
$SQL12 = "SELECT COUNT(ID_TAREA) as TareasMia FROM POSTULADOS WHERE ID_POSTULADO = '$id' AND ESTADO_POSTULACION LIKE 'A%';";
$result12 = mysqli_query($conn, $SQL12);
$getResultado = mysqli_fetch_array($result12);
$disponibles =  $getResultado['TareasMia'];
