<?php

require_once "../../../Modelo/conexion_db.php";

require "../Clases.php";

if (isset($_SESSION['id'])) {

    $id = $_SESSION['id'];

    // seleccionar datos de la tabla estudiante.
    $datosPersonales = "SELECT IDENTIDAD, NOMBRES, APELLIDOS, EDAD, FECHA_REGISTRO, CELULAR, CORREO, ROL, GRADO, NOMBRE_TECNICA FROM ESTUDIANTES WHERE IDENTIDAD = $id;";

    $RetornoDatosPersonales = mysqli_query($conn, $datosPersonales);
    $DatosPerfil = mysqli_fetch_assoc($RetornoDatosPersonales);

    // print_r($DatosPerfil);

    // foreach ($DatosPerfil as $key => $value) {
    //     echo $key . " : " . $value . " <br>";
    // }

    $Datos_estudiante = new Estudiante ();

    var_dump($Datos_estudiante);
} 
// unset($_SESSION['id']);

header("Location:../../../Vista/perfiles/perfil_estudiante.php");
// 
// include "../../../Vista/perfiles/perfil_estudiante.php";