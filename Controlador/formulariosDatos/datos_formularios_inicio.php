<?php
# TODO VALIDAR LOS DATOS PARA EL INICIO DE SESIÓN.

// esta página es para recibir los datos de los distintos formularios de inicio de sesión.
require_once "../../Modelo/conexion_db.php";
//  session_start();


if (isset($_POST['iniciar_sesion_estudiantes']) or isset($_POST['iniciar_sesion_directivos']) or isset($_POST['iniciar_sesion_adminstradores'])) {

    $rol = $_POST['rol'];
    $identidad = $_POST['documento'];
    $password = $_POST['password'];

    $_SESSION['id'] = $identidad;

    $_REQUEST['id'] = $identidad;


    if (isset($_POST['iniciar_sesion_estudiantes'])) {

        $consultaEstudiante = "SELECT IDENTIDAD, CONTRA FROM ESTUDIANTES WHERE IDENTIDAD = \"$identidad\";";

        $consultar = mysqli_query($conn, $consultaEstudiante);
        $numero_resultados = mysqli_num_rows($consultar);
        $pedirOrden = mysqli_fetch_array($consultar);

        if (($numero_resultados == 1) && password_verify($password, $pedirOrden['CONTRA'])) {
            // Cuerpo para buscar el perfil del estudiante
            header('Location:../../Vista/perfiles/perfil_estudiante.php');
        } else {
            // fail estudiante 
            echo "paila $identidad <br>";
            // mostrar las alertas al formulario de inicio
            $_SESSION['tipoAlertaInicio'] = "error";
            $_SESSION['tituloInicio'] = "Error";
            $_SESSION['mensajeInicio'] = "Usuario o Contraseña son incorrectos. ";
            header('Location:inicio_sesion.php');

        }
    }

    if (isset($_POST['iniciar_sesion_directivos'])) {

        $consultaDirectivo = "SELECT IDENTIDAD, CONTRA FROM DIRECTIVOS WHERE IDENTIDAD = \"$identidad\";";

        $consultar = mysqli_query($conn, $consultaDirectivo);

        $numero_resultados = mysqli_num_rows($consultar);

        $pedirOrden = mysqli_fetch_array($consultar);

        if (($numero_resultados == 1) && password_verify($password, $pedirOrden['CONTRA'])) {
            // Cuerpo para buscar el perfil del directivo
            header('Location:../../Vista/perfiles/perfil_directivo.php');
        } else {
            // La pelaste
            echo "fail directivo";
            $_SESSION['tipoAlerta'] = "error";
            $_SESSION['titulo'] = "Error";
            $_SESSION['mensajee'] = "Usuario o Contraseña son incorrectos. ";
        }
    }

    if (isset($_POST['iniciar_sesion_adminstradores'])) {

        $consultaAdministrador = "SELECT IDENTIDAD, CONTRA FROM ADMINS WHERE IDENTIDAD = \"$identidad\";";
        $consultar = mysqli_query($conn, $consultaAdministrador);
        $numero_resultados = mysqli_num_rows($consultar);
        $pedirOrden = mysqli_fetch_array($consultar);

        if (($numero_resultados == 1) && password_verify($password, $pedirOrden['CONTRA'])) {
            // Cuerpo para buscar el perfil del admin
            header('Location:../../Vista/perfiles/perfil_admin.php');
        } else {
            echo "fail admin";
            $_SESSION['tipoAlerta'] = "error";
            $_SESSION['titulo'] = "Error";
            $_SESSION['mensajee'] = "Usuario o Contraseña son incorrectos. ";
        }
    }
}

mysqli_close($conn);
