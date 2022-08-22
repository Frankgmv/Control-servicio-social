<?php
include "../../../Modelo/conexion_db.php";

if (isset($_POST['Postularse'])) {

    $id_tarea = $_POST['id_tarea'];
    $id_estudiantes = $_POST['id_estudiantes'];
    // Verificación
    $SQLquery0 = "SELECT * FROM POSTULADOS WHERE ID_TAREA = '$id_tarea' AND ID_POSTULADO = '$id_estudiantes';";
    $consulta0 = mysqli_query($conn, $SQLquery0);
    $verificar = mysqli_fetch_array($consulta0);

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
    } else {
        header("Location:tareas.php");
        $_SESSION['tituloDeTareas'] = "Postulación Repetida.";
        $_SESSION['mensajeDeTareas'] = "Ya estás postulado a esta tarea, revisa tu perfil.";
        $_SESSION['tipoTareas'] = "warning";
    }
}
