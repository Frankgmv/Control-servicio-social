<?php
#Esta parte es para re-dirección y mostrar los diferentes formularios por medios de $_SESSION[''];
session_start();

if (isset($_POST['rol'])) {

    # verificar que no entre sin seleccionar un rol, re-dirección al index
    if ($_POST['rol'] == 'volver') {
        header('Location:../../index.php');
        $_SESSION['tipoAlerta'] = "warning";
        $_SESSION['tituloDeAlerte'] = "Advertencia. ";
        $_SESSION['mensajeDeAlerta'] = "Elige tu rol en la plataforma para poder continuar tu proceso de registro o inicio. ";
    } else {

        $rol = $_POST['rol'];

        $_SESSION['rol'] = $rol;

        #Definir todos los formularios para reasignar el correcto a mostrar
        $_SESSION['estudiante'] = 'd-none';
        $_SESSION['administrador'] = 'd-none';
        $_SESSION['directivo'] = 'd-none';

        // mostrador de formularios de inicio de sesión según el rol
        if (isset($_POST['inicio'])) {
            # Para definir el rol del inicio de sesión
            switch ($rol) {
                case 'estudiante':
                    $_SESSION['mensaje'] = 'sesión estudiantes.';
                    $_SESSION['nombreDeSession'] = 'iniciar_sesion_estudiantes';
                    break;
                case 'directivo':
                    $_SESSION['mensaje'] = 'sesión directivos.';
                    $_SESSION['nombreDeSession'] = 'iniciar_sesion_directivos';
                    break;
                case 'administrador':
                    $_SESSION['mensaje'] = 'sesión adminstradores.';
                    $_SESSION['nombreDeSession'] = 'iniciar_sesion_adminstradores';
                    break;
                default:
                    $_SESSION['tipoDeAlerte'] = "warning";
                    $_SESSION['tituloDeAlerte'] = " Error.";
                    $_SESSION['mensajeDeAlerta'] = "Acción fuera de los límites de la plataforma.";
                    header('Location:../../index.php');
                    break;
            }

            header('Location:inicio_sesion.php');
        }

        // registro
        if (isset($_POST['registro'])) {
            # Para definir el rol del registro para mostrar el formulario correcto
            switch ($rol) {
                case 'estudiante':
                    $_SESSION['estudiante'] = 'd-block';
                    break;
                case 'administrador':
                    $_SESSION['administrador'] = 'd-block';
                    break;
                case 'directivo':
                    $_SESSION['directivo'] = 'd-block';
                    break;
                default:
                    $_SESSION['tipoAlerta'] = "error";
                    $_SESSION['tituloDeAlerte'] = " Error. ";
                    $_SESSION['mensajeDeAlerta'] = "Acción fuera de los límites de la plataforma.";
                    header('Location:../../index.php');
                    break;
            }

            header('Location:nuevo_registro.php');
        }
    }
}
