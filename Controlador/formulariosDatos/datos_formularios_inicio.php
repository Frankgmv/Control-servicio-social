<?php
# TODO VALIDAR LOS DATOS PARA EL INICIO DE SESIÓN.

// esta página es para recibir los datos de los distintos formularios de inicio de sesión.
require_once "../../Modelo/conexion_db.php";
//  session_start();


if(isset($_POST['iniciar_sesion_estudiantes']) or isset($_POST['iniciar_sesion_directivos']) or isset($_POST['iniciar_sesion_adminstradores'])){

    $rol = $_POST['rol'];
    $identidad = $_POST['documento'];
    $password = $_POST['password'];
    

    if(isset($_POST['iniciar_sesion_estudiantes'])){

        $consultaEstudiante = "SELECT IDENTIDAD, CONTRA FROM ESTUDIANTES WHERE IDENTIDAD = \"$identidad\";";

        $consultar = mysqli_query($connAdmin, $consultaEstudiante);
        $numero_resultados = mysqli_num_rows($consultar);
        $pedirOrden = mysqli_fetch_array($consultar);
        
        
        

        if(($numero_resultados == 1) && password_verify($password, $pedirOrden['CONTRA'])){
            // Cuerpo para buscar el perfil del estudiante
            echo "Entre como estudiante";

        }else{
            // fail estudiante 
            echo "paila $identidad <br>";
            // $_SESSION[]
            // mostrar las alertas al formulario de inicio
            $_SESSION['tipoAlerta']="error";
            $_SESSION['']="";
            $_SESSION['']="";
        }
    }
    
    if(isset($_POST['iniciar_sesion_directivos'])){

        $consultaDirectivo = "SELECT IDENTIDAD, CONTRA FROM DIRECTIVOS WHERE IDENTIDAD = \"$identidad\";";

        $consultar = mysqli_query($connAdmin, $consultaDirectivo);

        $numero_resultados = mysqli_num_rows($consultar);

        $pedirOrden = mysqli_fetch_array($consultar);

        if(($numero_resultados == 1) && password_verify($password, $pedirOrden['CONTRA'])){
            // Cuerpo para buscar el perfil del directivo
            echo "Entre como directivo";
        }else{
            // La pelaste
            echo "fail directivo";
        }
    }
    
    if(isset($_POST['iniciar_sesion_adminstradores'])){

        $consultaAdministrador = "SELECT IDENTIDAD, CONTRA FROM ADMINS WHERE IDENTIDAD = \"$identidad\";";
        $consultar = mysqli_query($connAdmin, $consultaAdministrador);
        $numero_resultados = mysqli_num_rows($consultar);
        $pedirOrden = mysqli_fetch_array($consultar);

        if(($numero_resultados == 1) && password_verify($password, $pedirOrden['CONTRA'])){
            // Cuerpo para buscar el perfil del admin
            echo "Entre como admin";
        }else{
            echo "fail admin";
        }
    }
}else{
        // echo "no trae nada";

}

mysqli_close($connAdmin);
