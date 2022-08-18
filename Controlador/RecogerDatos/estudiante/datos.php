<?php

include_once "../../../Modelo /conexion_db.php";

// Clases para el estudiante.
include_once "../Clases.php";

$id = $_SESSION['id'];

if (isset($_SESSION['id'])) {

    // Seleccionar datos de la tabla estudiante.
    $datosPersonales = "SELECT IDENTIDAD, NOMBRES, APELLIDOS, EDAD, FECHA_REGISTRO, CELULAR, CORREO, ROL, GRADO, NOMBRE_TECNICA FROM ESTUDIANTES WHERE IDENTIDAD = $id;";
    $RetornoDatosPersonales = mysqli_query($conn, $datosPersonales);
    $DatosPerfil = mysqli_fetch_assoc($RetornoDatosPersonales);

    $vector = [];

    foreach ($DatosPerfil as $key => $value) {
        $vector[$key] = $value;
    }

    echo "hola estudiante. <br>";

    // Creando instancia estudiante
    $Estudiante = new Estudiante(
        $id,
        $DatosPerfil['NOMBRES'],
        $DatosPerfil['APELLIDOS'],
        $DatosPerfil['EDAD'],
        $DatosPerfil['FECHA_REGISTRO'],
        $DatosPerfil['CELULAR'],
        $DatosPerfil['CORREO'],
        $DatosPerfil['ROL'],
        $DatosPerfil['GRADO'],
        $DatosPerfil['NOMBRE_TECNICA'],
    );


    $_SESSION['vector'] = $vector;


    header("Location:../../../Vista/perfiles/estudiante/perfil_estudiante.php");

} else {
    echo "<script> alert(\"Se produjo un error al extraer los datos del estudiante, Carpeta:Controlador/RecogerDatos/estudiante/datos.php\")</script>";
    header("Location:../../../index.php");
}
