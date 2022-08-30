<?php

use LDAP\Result;

include "../../../Modelo/conexion_db.php";

class Directivo
{
    var $identidad ;
    var $nombres ;
    var $apellidos ;
    var $edad ;
    var $fecha_registro ;
    var $celular ;
    var $correo ;
    var $rol ;
    var $ocupacion ;
    var $donde_labora ;

    function Directivo($identidad)
    {

        global $conn;
        $datosPersonales = "SELECT * FROM DIRECTIVOS WHERE IDENTIDAD = $identidad;";

        $RetornoDatosPersonales = mysqli_query($conn, $datosPersonales);
        $DataDir = mysqli_fetch_assoc($RetornoDatosPersonales);
        $this->identidad = $DataDir['IDENTIDAD  '];
        $this->nombres = $DataDir['NOMBRES'];
        $this->apellidos = $DataDir['APELLIDOS'];
        $this->edad = $DataDir['EDAD'];
        $this->fecha_registro = $DataDir['FECHA_REGISTRO'];
        $this->celular = $DataDir['CELULAR'];
        $this->correo = $DataDir['CORREO'];
        $this->rol = $DataDir['ROL'];
        $this->ocupacion = $DataDir['OCUPACION'];
        $this->donde_labora = $DataDir['DONDE_LABORA'];
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
        global $conn;
        $SQL_6 = "SELECT * FROM TAREAS  WHERE ID_CREADOR = '$id_creador' ORDER BY ESTADO_TAREA ASC";
        $CONSULT_6 = mysqli_query($conn, $SQL_6);
        return $CONSULT_6;
    }


    function Get_contar_los_postulados($id_tarea)
    {
        global $conn;
        $sql_5 = "SELECT  COUNT(ID_POSTULADO) AS TOTAL FROM POSTULADOS WHERE ID_TAREA = '$id_tarea';";
        $CONSULT_5 = mysqli_query($conn, $sql_5);
        $result__5 = mysqli_fetch_array($CONSULT_5);

        $sql_10 = "SELECT  COUNT(ID_POSTULADO) AS ACTIVOS FROM POSTULADOS WHERE ID_TAREA = '$id_tarea' AND ESTADO_POSTULACION LIKE 'A%';";
        $CONSULT_10 = mysqli_query($conn, $sql_10);
        $result__10 = mysqli_fetch_array($CONSULT_10);


        $activos = $result__10['ACTIVOS'];
        $total = $result__5['TOTAL'];
        $inactivos = $total - $activos;

        $N_POSTULACIONES = array('ACTIVOS' => $activos, 'TOTALES' =>  $total, 'INACTIVOS' => $inactivos);

        return $N_POSTULACIONES;
    }

    function Get_datos_del_postulado($id_tarea)
    {
        global $conn;
        $slq_8 = "SELECT * FROM POSTULADOS WHERE ID_TAREA = '$id_tarea' ORDER BY ESTADO_POSTULACION ASC;";
        $CONSULT_8 = mysqli_query($conn, $slq_8);
        return $CONSULT_8;
    }
    function Set_modificar_tarea($id_modificador, $id_tarea_editar, $NOMBRE_TAREA, $FECHA_LIMITE, $PARA_QUE_GRADO, $NUMERO_HORAS, $N_PERSONAS, $descripcion, $objetivo)
    {
        global $conn;
        $slq_13 = "UPDATE TAREAS SET NOMBRE_TAREA = '$NOMBRE_TAREA', DESCRIPCION = '$descripcion' , FECHA_LIMITE = '$FECHA_LIMITE', NUMERO_HORAS = $NUMERO_HORAS, OBJETIVO = '$objetivo', PARA_QUE_GRADO = '$PARA_QUE_GRADO', N_PERSONAS = $N_PERSONAS   WHERE ID_TAREA = '$id_tarea_editar' AND ID_CREADOR = '$id_modificador';";
        $consulta_13 = mysqli_query($conn, $slq_13);


        if(!$consulta_13){
            return 0;
        }else{
            $string = "Cambio a tarea N° $id_tarea_editar ";
            $modify_sql = "INSERT INTO MODIFICACIONES (ID_MODIFICADOR,FECHA_MODIFICACION, TIPO_MODIFICACION) VALUE ('$id_modificador',CURRENT_DATE(),'$string');";
            $modify_consult = mysqli_query($conn, $modify_sql);

            if($modify_consult){
                return 1;
            }   
        }
    }

    function Get_datos_del_estudiante($identidad)
    {
        global $conn;
        // 
        $sql_7 = "SELECT * FROM ESTUDIANTES WHERE IDENTIDAD = '$identidad';";
        $CONSULT_7 = mysqli_query($conn, $sql_7);
        $result__7 = mysqli_fetch_array($CONSULT_7);

        return $result__7;
    }

    function Borrar_tarea()
    {
    }

    function Set_terminar_tarea()
    {
    }
    function Set_Crear_nueva_tarea()
    {
    }

    function Get_todas_las_tareas()
    {
    }

    function Set_Borrar_postulaciones()
    {
    }

    function Set_modificaciones($id, $Tipo_modificacion)
    {
    }
}

if (isset($_SESSION['id_dir'])) {

    $id = $_SESSION['id_dir'];

    $Boss = new Directivo($id);

    if (isset($_POST['EditarTarea'])) {

        $id_tarea_editar = $_POST['id_tarea'];
        $NOMBRE_TAREA = $_POST['NOMBRE_TAREA'];
        $FECHA_LIMITE = $_POST['FECHA_LIMITE'];
        $PARA_QUE_GRADO = $_POST['PARA_QUE_GRADO'];
        $NUMERO_HORAS = $_POST['NUMERO_HORAS'];
        $N_PERSONAS = $_POST['N_PERSONAS'];
        $descripcion = $_POST['descripcion'];
        $objetivo = $_POST['objetivo'];

        $respuesta = $Boss->Set_modificar_tarea($id, $id_tarea_editar, $NOMBRE_TAREA, $FECHA_LIMITE, $PARA_QUE_GRADO, $NUMERO_HORAS, $N_PERSONAS, $descripcion, $objetivo);

        switch($respuesta){
            case 0:
                break;
            case 1:
                break;
            case 2:
                break;
            default:
                break;
        }
    }

    if (isset($_POST['TerminarTarea'])) {
        $id_tarea = $_POST['id_tarea'];
        $id_creador = $_POST['id_user'];
        $id_postulado = $_POST['id_postulado'];

        echo "Tareas terminada $id_tarea";
    }

    if (isset($_POST['EliminarPostulacion'])) {
        $id_tarea = $_POST['id_tarea'];
        $id_creador = $_POST['id_user'];
        $id_postulado = $_POST['id_postulado'];

        echo "Eliminar a $id_postulado de la tarea $id_tarea";
    }

    if (isset($_POST['DesactivarPostulacion'])) {
        $id_tarea = $_POST['id_tarea'];
        $id_creador = $_POST['id_user'];
        $id_postulado = $_POST['id_postulado'];

        echo "pausar a $id_postulado de la tarea $id_tarea";
    }

    if (isset($_POST['EliminarTarea'])) {

        $id_tarea_eliminar = $_POST['id_tarea'];
        echo "eliminar " . $id_tarea_eliminar;
    }


    header("../../../Vista/perfiles/directivo/perfil_directivo.php");
} else {

    header("Location:../../../Controlador/formulariosDatos/inicio_sesion.php");

    $_SESSION['mensajeInicio'] = "Por favor inicia sesión nuevamente.";
    $_SESSION['tipoAlertaInicio'] = "warning";
    $_SESSION['tituloInicio'] = "Reingreso fallido";
}
