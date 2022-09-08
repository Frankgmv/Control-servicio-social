<?php

include "../../../Controlador/RecogerDatos/estudiante/datos.php";

if (isset($_POST['Postularse'])) {

    $id_tarea = $_POST['id_tarea'];
    $id_estudiantes = $_POST['id_estudiantes'];
    $Grado = $_POST['PARA_QUE_GRADO'];

    $postularme = $Pepito->Set_postularse_a_tarea($id_estudiantes, $id_tarea, $Grado);

    switch ($postularme) {
        case 0:
            $_SESSION['tituloDeTareas'] = "Error de Postulación";
            $_SESSION['mensajeDeTareas'] = "Incapacidad de postularse a tarea por razones desconocidas.";
            $_SESSION['tipoTareas'] = "error";
            break;
        case 1:
            $_SESSION['tituloDeTareas'] = "Postulación";
            $_SESSION['mensajeDeTareas'] = "Postulación a tarea hecha correctamente.";
            $_SESSION['tipoTareas'] = "success";
            break;
        case 2:
            $_SESSION['tituloDeTareas'] = "Reactivación fallida";
            $_SESSION['mensajeDeTareas'] = "Se reactivo nuevamente tu postulación correctamente.";
            $_SESSION['tipoTareas'] = "error";
            break;
        case 3:
            $_SESSION['tituloDeTareas'] = "Postulación Reactivada";
            $_SESSION['mensajeDeTareas'] = "Se reactivo nuevamente tu postulación correctamente.";
            $_SESSION['tipoTareas'] = "success";
            break;
        case 4:
            $_SESSION['tituloDeTareas'] = "Postulación Repetida.";
            $_SESSION['mensajeDeTareas'] = "Ya estás postulado a esta tarea, revisa tu perfil.";
            $_SESSION['tipoTareas'] = "warning";
            break;
        case 5:
            $_SESSION['tituloDeTareas'] = "No puedes postularte";
            $_SESSION['mensajeDeTareas'] = "La tarea no esta habilitada para tu GRUPO / GRADO actualmente";
            $_SESSION['tipoTareas'] = "warning";
            break;
        default:
            $_SESSION['tituloDeTareas'] = "Error";
            $_SESSION['mensajeDeTareas'] = "hubo un error en las postulaciones, por favor notifíquelo";
            $_SESSION['tipoTareas'] = "error";
            break;
    }
    header("Location:tareas.php");
}


if (isset($_POST['Anular_postulacion'])) {

    $ID_EST  = $_POST['id_user'];
    $ID_TAREA = $_POST['id_tarea'];
    $anularPostulacion = $Pepito->Set_anular_postulacion($ID_EST, $ID_TAREA);

    if ($anularPostulacion == 0) {

        $_SESSION['tituloDePerfil'] = "Desvinculación fallida.";
        $_SESSION['mensajeDePerfil'] = "Hubo un error en el proceso, por favor notificar al admin   .";
        $_SESSION['tipoPerfil'] = "success";
    } else {

        $_SESSION['tituloDePerfil'] = "Postulación desactiva.";
        $_SESSION['mensajeDePerfil'] = "Desvinculación hecha correctamente.";
        $_SESSION['tipoPerfil'] = "success";
    }

    if ($anularPostulacion == 2) {
        $_SESSION['tituloDePerfil'] = "Postulación Ya Anulada. ";
        $_SESSION['mensajeDePerfil'] = "Ya no eres participante de esta tarea.";
        $_SESSION['tipoPerfil'] = "warning";
    }
    
    header("Location:perfil_estudiante.php");
}
