<?php

include "../../Modelo/conexion_db.php";

$id = $_SESSION['id'];

// EXTRAER DATOS DEL ESTUDIANTE COMPLETOS 
$datosPersonales = "SELECT IDENTIDAD, NOMBRES, APELLIDOS, EDAD, FECHA_REGISTRO, CELULAR, CORREO, ROL, GRADO, NOMBRE_TECNICA FROM ESTUDIANTES WHERE IDENTIDAD = $id;";
$Horas = "SELECT  FROM Horas WHERE IDENTIDAD = $id;";

$RetornoDatosPersonales = mysqli_query($conn, $datosPersonales);

$DatosPerfil =mysqli_fetch_assoc($RetornoDatosPersonales);

foreach ($DatosPerfil as $key => $value) {
    echo $key." : ".$value." <br>";
}



