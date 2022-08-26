<?php
include "../../../Modelo/conexion_db.php";

class Directivo
{
    var $identidad = " 00";
    var $nombres = " desconocidos";
    var $apellidos = " desconocidos";
    var $edad = " desconocidos";
    var $fecha_registro = " desconocidos";
    var $celular = " desconocidos";
    var $correo = " desconocidos";
    var $rol = " desconocidos";
    var $ocupacion = " desconocidos";
    var $donde_labora = " desconocidos";

    function Directivo($identidad, $nombres, $apellidos, $edad, $fecha_registro, $celular, $correo, $rol, $ocupacion, $donde_labora)
    {
        $identidad = $identidad;
        $nombres = $nombres;
        $apellidos = $apellidos;
        $edad = $edad;
        $fecha_registro = $fecha_registro;
        $celular = $celular;
        $correo = $correo;
        $rol = $rol;
        $ocupacion = $ocupacion;
        $donde_labora = $donde_labora;
    }


    function Get_mis_datos($id)
    {
        global $conn;
        $sql_3 = "SELECT * FROM DIRECTIVOS WHERE IDENTIDAD = '$id';";
        $consultY = mysqli_query($conn, $sql_3);
        $result3 = mysqli_fetch_array($consultY);
        return $result3;
    }
    function Get_numero_de_tareas_y_horas($id_creador)
    {
        global $conn;
        $SQL_4  = "SELECT SUM(NUMERO_HORAS) as HORAS FROM TAREAS WHERE ID_CREADOR = '$id_creador';";
        $CONSULT_4 = mysqli_query($conn, $SQL_4);
        $RESULT_4 = mysqli_fetch_array($CONSULT_4);

        $SQL_5 = "SELECT COUNT(ID_TAREA) as N_TAREAS FROM TAREAS WHERE ID_CREADOR = '$id_creador';";
        $CONSULT_5 = mysqli_query($conn, $SQL_5);
        $RESULT_5 = mysqli_fetch_array($CONSULT_5);

        $Dos = array('TOTAL_HORAS' => $RESULT_4['HORAS'], 'TOTAL_TAREAS' => $RESULT_5['N_TAREAS']);
        return $Dos;
    }
    function Get_mis_tarea($id_creador)
    {
    }
    function Borra_tarea()
    {
    }
    function Set_terminar_tarea()
    {
    }
    function Set_modificar_tarea()
    {
    }
    function Set_nueva_tarea()
    {
    }

    function Get_todas_las_tareas()
    {
    }
    function Get_Todos_los_postulados()
    {
    }
    function Set_Borrar_postulaciones()
    {
    }


    function Set_modificaciones()
    {
    }
}

if (isset($_SESSION['id_dir'])) {

    $id = $_SESSION['id_dir'];

    // SELECCIONAR DATOS DE LA TABLA DIRECTIVOS.
    $datosPersonales = "SELECT * FROM DIRECTIVOS WHERE IDENTIDAD = $id;";

    $RetornoDatosPersonales = mysqli_query($conn, $datosPersonales);
    $DataDir = mysqli_fetch_assoc($RetornoDatosPersonales);

    $Boss = new Directivo(
        $id,
        $DataDir['NOMBRES'],
        $DataDir['APELLIDOS'],
        $DataDir['EDAD'],
        $DataDir['FECHA_REGISTRO'],
        $DataDir['CELULAR'],
        $DataDir['CORREO'],
        $DataDir['ROL'],
        $DataDir['OCUPACION'],
        $DataDir['DONDE_LABORA'],
    );

    header("../../../Vista/perfiles/directivo/perfil_directivo.php");
} else {

    header("Location:../../../Controlador/formulariosDatos/inicio_sesion.php");

    $_SESSION['mensajeInicio'] = "Por favor inicia sesión nuevamente.";
    $_SESSION['tipoAlertaInicio'] = "warning";
    $_SESSION['tituloInicio'] = "Reingreso fallido";
}
