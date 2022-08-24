<?php 

include "../../../Modelo/conexion_db.php";

if(isset($_SESSION['id'])){

    $id = $_SESSION['id'];

    // IDENTIDAD, NOMBRES, APELLIDOS, EDAD, FECHA_REGISTRO, CELULAR, CORREO, ROL, GRADO, NOMBRE_TECNICA
    // seleccionar datos de la tabla estudiante.
    $datosPersonales = "SELECT * FROM DIRECTIVOS WHERE IDENTIDAD = $id;";

    $RetornoDatosPersonales = mysqli_query($conn, $datosPersonales);    
    $DatosPerfil =mysqli_fetch_assoc($RetornoDatosPersonales);

    foreach ($DatosPerfil as $key => $value) {
        echo $key." : ".$value." <br>";
    }

    
    
} 

header("../../../Vista/perfiles/directivo/perfil_directivo.php");

// include "../../../Vista/perfiles/directivo/perfil_directivo.php";
