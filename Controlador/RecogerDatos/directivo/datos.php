<?php
include "../../../Modelo/conexion_db.php";

class Directivo
{
    var $identidad;
    var $nombres;
    var $apellidos;
    var $edad;
    var $fecha_actual;
    var $celular;
    var $correo;
    var $rol;
    var $ocupacion;
    var $donde_labora;

    function __construct($identidad, $nombres, $apellidos, $edad, $fecha_actual, $celular, $correo, $rol, $ocupacion, $donde_labora)
    {
        $identidad = $identidad;
        $nombres = $nombres;
        $apellidos = $apellidos;
        $edad = $edad;
        $fecha_actual = $fecha_actual;
        $celular = $celular;
        $correo = $correo;
        $rol = $rol;
        $ocupacion = $ocupacion;
        $donde_labora = $donde_labora;
    }

    function Crear_tarea()
    {
    }
}



if (isset($_SESSION['id'])) {

    $id = $_SESSION['id'];

    // IDENTIDAD, NOMBRES, APELLIDOS, EDAD, FECHA_REGISTRO, CELULAR, CORREO, ROL, GRADO, NOMBRE_TECNICA
    // seleccionar datos de la tabla estudiante.
    $datosPersonales = "SELECT * FROM DIRECTIVOS WHERE IDENTIDAD = $id;";

    $RetornoDatosPersonales = mysqli_query($conn, $datosPersonales);
    $DatosPerfil = mysqli_fetch_assoc($RetornoDatosPersonales);

    foreach ($DatosPerfil as $key => $value) {
        echo $key . " : " . $value . " <br>";
    }
}

header("../../../Vista/perfiles/directivo/perfil_directivo.php");

// include "../../../Vista/perfiles/directivo/perfil_directivo.php";
