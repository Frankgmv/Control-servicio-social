<?php
include "../../../Modelo/conexion_db.php";

if (isset($_POST['Postularse'])) {

    $id_tarea = $_POST['id_tarea'];
    $id_estudiantes = $_POST['id_estudiantes'];

    // Verificación
    $SQLquery0 = "SELECT ESTADO_POSTULACION FROM POSTULADOS WHERE ID_TAREA = '$id_tarea' AND ID_POSTULADO = '$id_estudiantes';";
    $consulta0 = mysqli_query($conn, $SQLquery0);
    $verificar = mysqli_fetch_array($consulta0);

    // conteo de las que pertenezco y están activas
    $SQL13 = "SELECT COUNT(ID_TAREA)  FROM POSTULADOS WHERE ID_POSTULADO = '$id' AND ESTADO_POSTULACION LIKE 'A%';";
    $result13 = mysqli_query($conn, $SQL13);
    $getResultado = mysqli_fetch_array($result13);

    if (!$verificar) {
        // Insertar
        $SQLquery1 = "INSERT INTO POSTULADOS(ID_POSTULADO, ID_TAREA, FECHA_POSTULACION, ESTADO_POSTULACION) VALUES ('$id_estudiantes', '$id_tarea',CURRENT_DATE(), 'ACTIVA');";
        $consulta1 = mysqli_query($conn, $SQLquery1);

        if (!$consulta1) {
            header("Location:tareas.php");
            $_SESSION['tituloDeTareas'] = "Error de Postulación";
            $_SESSION['mensajeDeTareas'] = "Incapacidad de postularse a tarea por razones desconocidas.";
            $_SESSION['tipoTareas'] = "error";
        } else {
            header("Location:tareas.php");
            $_SESSION['tituloDeTareas'] = "Postulación";
            $_SESSION['mensajeDeTareas'] = "Postulación a tarea hecha correctamente.";
            $_SESSION['tipoTareas'] = "success";
        }
    } elseif (strtoupper($verificar['ESTADO_POSTULACION']) == 'INACTIVA') {
        // reactiva la postulación 
        $SLQ10 = "UPDATE POSTULADOS SET ESTADO_POSTULACION = 'ACTIVA' WHERE ID_POSTULADO = '$id_estudiantes' AND ID_TAREA = '$id_tarea';";
        $query3 = mysqli_query($conn, $SLQ10);

        if (!$query3) {

            $_SESSION['tituloDeTareas'] = "Reactivación fallida";
            $_SESSION['mensajeDeTareas'] = "Se reactivo nuevamente tu postulación correctamente.";
            $_SESSION['tipoTareas'] = "error";
        } else {
            $_SESSION['tituloDeTareas'] = "Postulación Reactivada";
            $_SESSION['mensajeDeTareas'] = "Se reactivo nuevamente tu postulación correctamente.";
            $_SESSION['tipoTareas'] = "success";
        }

        header("Location:tareas.php");
    } else {
        header("Location:tareas.php");
        $_SESSION['tituloDeTareas'] = "Postulación Repetida.";
        $_SESSION['mensajeDeTareas'] = "Ya estás postulado a esta tarea, revisa tu perfil.";
        $_SESSION['tipoTareas'] = "warning";
    }
}


if (isset($_POST['Anular_postulacion'])) {

    $ID_EST  = $_POST['id_user'];
    $ID_TAREA = $_POST['id_tarea'];
    // obtener el estado de postulación
    // $SLQ8 = "SELECT ESTADO_POSTULACION FROM POSTULADOS WHERE ID_POSTULADO = '$ID_EST' AND ID_TAREA = '$ID_TAREA' and ESTADO_POSTULACION LIKE 'A%' or ESTADO_POSTULACION LIKE 'I%';";
    $SLQ8 = "SELECT ESTADO_POSTULACION FROM POSTULADOS WHERE ID_POSTULADO = '$ID_EST' AND ID_TAREA = '$ID_TAREA';";
    $query2 = mysqli_query($conn, $SLQ8);
    $result8 = mysqli_fetch_array($query2);


    // verificar si esta inactivo para no repetirlo de nuevo
    if (strtoupper($result8['ESTADO_POSTULACION']) == 'ACTIVA') {

        $SLQ9 = "UPDATE POSTULADOS SET ESTADO_POSTULACION = 'INACTIVA' WHERE ID_POSTULADO = '$ID_EST' AND ID_TAREA = '$ID_TAREA';";
        $result9 = mysqli_query($conn, $SLQ9);
        if (!$result9) {

            $_SESSION['tituloDePerfil'] = "Desvinculación fallida.";
            $_SESSION['mensajeDePerfil'] = "Hubo un error en el proceso, por favor notificar al admin   .";
            $_SESSION['tipoPerfil'] = "success";
            header("Location:perfil_estudiante.php");
        } else {

            $_SESSION['tituloDePerfil'] = "Desactivar Postulación";
            $_SESSION['mensajeDePerfil'] = "Desvinculación hecha correctamente.";
            $_SESSION['tipoPerfil'] = "success";
            header("Location:perfil_estudiante.php");
        }
    } else {
        $_SESSION['tituloDePerfil'] = "Postulación Ya Anulada. ";
        $_SESSION['mensajeDePerfil'] = "id_estu :$ID_EST <=> id_tarea $ID_TAREA " . $result8['ESTADO_POSTULACION'];
        $_SESSION['tipoPerfil'] = "warning";
        header("Location:perfil_estudiante.php");
    }
}
