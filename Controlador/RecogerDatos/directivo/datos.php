<?php 

include "../../../Modelo/conexion_db.php";

if(isset($_SESSION['id'])){

    $id = $_SESSION['id'];

    // seleccionar datos de la tabla estudiante.
    $datosPersonales = "SELECT IDENTIDAD, NOMBRES, APELLIDOS, EDAD, FECHA_REGISTRO, CELULAR, CORREO, ROL, GRADO, NOMBRE_TECNICA FROM ESTUDIANTES WHERE IDENTIDAD = $id;";

    $RetornoDatosPersonales = mysqli_query($conn, $datosPersonales);    
    $DatosPerfil =mysqli_fetch_assoc($RetornoDatosPersonales);

    print_r($DatosPerfil);
    foreach ($DatosPerfil as $key => $value) {
        echo $key." : ".$value." <br>";
    }

    
    
} 

header("../../../Vista/perfiles/directivo/perfil_directivo.php");

// include "../../../Vista/perfiles/directivo/perfil_directivo.php";
