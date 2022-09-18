<?php
# TODO VALIDAR LOS DATOS PARA EL INICIO DE SESIÓN.

// esta página es para recibir los datos de los distintos formularios de inicio de sesión.

require_once "../../Modelo/conexion_db.php";
//  session_start();


if (isset($_POST['iniciar_sesion_estudiantes']) or isset($_POST['iniciar_sesion_directivos']) or isset($_POST['iniciar_sesion_adminstradores'])) {

    $rol = $_POST['rol'];
    $identidad = $_POST['documento'];
    $password = $_POST['password'];


    if (isset($_POST['iniciar_sesion_estudiantes'])) {

        $consultaEstudiante = "SELECT IDENTIDAD, CONTRA FROM ESTUDIANTES WHERE IDENTIDAD = \"$identidad\";";

        $consultar = mysqli_query($conn, $consultaEstudiante);
        $numero_resultados = mysqli_num_rows($consultar);
        $pedirOrden = mysqli_fetch_array($consultar);

        if (($numero_resultados == 1) && password_verify($password, $pedirOrden['CONTRA'])) {
            // Cuerpo para buscar el perfil del estudiante
            $_SESSION['id'] = $identidad;
            header('Location:../../Vista/perfiles/estudiante/perfil_estudiante.php');
        } else {
            // fail estudiante 
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
            $_SESSION['id_dir'] = $identidad;
            header('Location:../../Vista/perfiles/directivo/perfil_directivo.php');
        } else {
            // fail directivo 
            $_SESSION['tipoAlertaInicio'] = "warning";
            $_SESSION['tituloInicio'] = "Error";
            $_SESSION['mensajeInicio'] = "Usuario o Contraseña son incorrectos. ";
            header('Location:inicio_sesion.php');
        }
    }

    if (isset($_POST['iniciar_sesion_adminstradores'])) {

        $consultaAdministrador = "SELECT IDENTIDAD, CONTRA FROM ADMINS WHERE IDENTIDAD = \"$identidad\";";
        $consultar = mysqli_query($conn, $consultaAdministrador);
        $numero_resultados = mysqli_num_rows($consultar);
        $pedirOrden = mysqli_fetch_array($consultar);

        if (($numero_resultados == 1) && password_verify($password, $pedirOrden['CONTRA'])) {
            // Cuerpo para buscar el perfil del admin
            $_SESSION['id_adm'] = $identidad;
            header('Location:../../Vista/perfiles/_admin/perfil_admin.php');
        } else {
            // fail admin
            $_SESSION['tipoAlertaInicio'] = "error";
            $_SESSION['tituloInicio'] = "Error";
            $_SESSION['mensajeInicio'] = "Usuario o Contraseña son incorrectos. ";
            header('Location:inicio_sesion.php');
        }
    }
}

mysqli_close($conn);
