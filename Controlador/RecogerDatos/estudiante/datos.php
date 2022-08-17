<?php

// Clases para el estudiante.

'
class Estudiante
{
    // Propiedades
    

    function __construct($id, )
    {
        $identidad =
        $nombre =
        $apellido =
        $edad = 

        
    }
    

    // métodos
}
';

include_once "../../../Modelo/conexion_db.php";

$id = $_SESSION['id'];

if (isset($_SESSION['id'])) {


    // seleccionar datos de la tabla estudiante.
    $datosPersonales = "SELECT IDENTIDAD, NOMBRES, APELLIDOS, EDAD, FECHA_REGISTRO, CELULAR, CORREO, ROL, GRADO, NOMBRE_TECNICA FROM ESTUDIANTES WHERE IDENTIDAD = $id;";
    $RetornoDatosPersonales = mysqli_query($conn, $datosPersonales);
    $DatosPerfil = mysqli_fetch_assoc($RetornoDatosPersonales);



    foreach ($DatosPerfil as $key => $value) {
        echo $key . " : " . $value . " <br>";
    }
    
    var_dump($Datos_estudiante);
} else {
    echo "<script> alert(\"Se produjo un error al extraer los datos del estudiante, Carpeta:Controlador/RecogerDatos/estudiante/datos.php\")</script>";
    header("Location:../../../index.php");
}

// $Datos_estudiante = new Estudiante();

header("Location:../../../Vista/perfiles/estudiante/perfil_estudiante.php");

// include "../../../Vista/perfiles/estudiante/perfil_estudiante.php":
