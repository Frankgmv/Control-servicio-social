<?php

include "../../../Modelo/conexion_db.php";

$connN = $conn;


class Directivo
{
    var $identidad;
    var $nombres;
    var $apellidos;
    var $edad;
    var $fecha_registro;
    var $celular;
    var $correo;
    var $rol;
    var $ocupacion;
    var $donde_labora;

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
        $sql_5 = "SELECT COUNT(ID_POSTULADO) AS TOTAL FROM POSTULADOS WHERE ID_TAREA = '$id_tarea';";
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

        if (!$consulta_13) {
            return 0;
        } else {
            return 1;
        }
    }

    function Get_datos_del_estudiante($identidad)
    {
        global $conn;

        $sql_7 = "SELECT concat(NOMBRES,' ',APELLIDOS) as NOMBRES, IDENTIDAD as ID_E, GRADO  FROM ESTUDIANTES WHERE IDENTIDAD = '$identidad';";
        $CONSULT_7 = mysqli_query($conn, $sql_7);
        $rest = mysqli_fetch_array($CONSULT_7);

        return $rest;
    }

    function Set_terminar_tarea($id_tarea, $id_creador)
    {
        global $conn;
        $sql_14 = "UPDATE TAREAS SET ESTADO_TAREA = 'Terminada' WHERE ID_TAREA = '$id_tarea' AND ID_CREADOR = '$id_creador';";
        $consulta_14 = mysqli_query($conn, $sql_14);

        if (!$consulta_14) {
            return 0;
        } else {
            return 1;
        }
    }
    function Set_confirmar_horas($id_tarea)
    {
        global $conn;

        // Seleccionar los datos de la tarea
        $sql_20 = "SELECT ID_TAREA ,NOMBRE_TAREA, FECHA_CREACION, NUMERO_HORAS FROM TAREAS WHERE ID_TAREA = $id_tarea ;";
        $cons_20 = mysqli_query($conn, $sql_20);
        $resp = mysqli_fetch_array($cons_20);

        $ID_TAREA = $resp['ID_TAREA'];
        $NOMBRE_TAREA = $resp['NOMBRE_TAREA'];
        $FECHA_CREACION = $resp['FECHA_CREACION'];
        $HORAS = $resp['NUMERO_HORAS'];

        // Seleccionar todos los Estudiantes postulados y ACTIVOS

        $sql_22 = "SELECT ID_POSTULADO as ID_E FROM POSTULADOS WHERE ID_TAREA = '$ID_TAREA' AND ESTADO_POSTULACION like 'A%';";
        $cons_22 = mysqli_query($conn, $sql_22);

        if ($cons_22) {

            $cont = 0;

            while ($Ids = mysqli_fetch_array($cons_22)) {

                $ID_ESTUDIANTE = $Ids['ID_E'];

                $sql_21 = "INSERT INTO HORAS (ID_ESTUDIANTE, ID_TAREA, NOMBRE_TAREA, FECHA_CREACION, HORAS) VALUES ('$ID_ESTUDIANTE','$ID_TAREA' ,'$NOMBRE_TAREA', '$FECHA_CREACION', '$HORAS');";
                $cons_21 = mysqli_query($conn, $sql_21);

                if ($cons_21) {
                    $cont++;
                }
            }
            return $cont;
        } else {
            return 0;
        }
    }

    function Borrar_postulaciones_totales($id_tarea)
    {
        global $conn;
        $delete = "DELETE FROM POSTULADOS WHERE ID_TAREA = '$id_tarea';";
        $cons = mysqli_query($conn, $delete);

        if (!$cons) {
            return 0;
        } else {
            return 1;
        }
    }

    function Set_Borrar_postulaciones($id_postulado, $id_tarea)
    {
        global $conn;
        $sql_15 = "DELETE FROM POSTULADOS WHERE ID_TAREA = '$id_tarea' AND ID_POSTULADO = '$id_postulado';";
        $consulta_15 = mysqli_query($conn, $sql_15);

        if (!$consulta_15) {
            return 0;
        } else {
            return 1;
        }
    }

    function Borrar_tarea($id_tarea)
    {
        global $conn;

        $del_task = "DELETE FROM TAREAS WHERE ID_TAREA = '$id_tarea';";

        $QE = mysqli_query($conn, $del_task);

        if (!$QE) {
            return "paila";
        } else {
            return "sirvió";
        }
    }

    function Set_estado_postulaciones($id_postulado, $id_tarea)
    {
        global $conn;

        $sql_1 = "SELECT ESTADO_POSTULACION as EST FROM POSTULADOS WHERE ID_POSTULADO = '$id_postulado' AND ID_TAREA = '$id_tarea';";
        $CONS = mysqli_query($conn, $sql_1);
        $restul = mysqli_fetch_array($CONS);

        if (strtoupper($restul['EST']) == "ACTIVA") {
            $POSTULACION = "INACTIVA";
        } else {
            $POSTULACION = "ACTIVA";
        }

        $sql_16 = "UPDATE POSTULADOS SET ESTADO_POSTULACION = '$POSTULACION' WHERE ID_TAREA = $id_tarea AND ID_POSTULADO = $id_postulado ;";
        $consulta_16 = mysqli_query($conn, $sql_16);

        if (!$consulta_16) {
            return 0;
        } else {
            return 1;
        }
    }

    function Set_modificaciones($id_modificador, $Tipo_modificacion)
    {
        global $conn;
        $modify_sql = "INSERT INTO MODIFICACIONES (ID_MODIFICADOR,FECHA_MODIFICACION, TIPO_MODIFICACION) VALUE ('$id_modificador',CURRENT_DATE(),'$Tipo_modificacion');";
        $modify_consult = mysqli_query($conn, $modify_sql);

        if ($modify_consult) {
            return 1;
        }
    }
    function Set_Crear_nueva_tarea($id_creador, $NOMBRE_TAREA, $FECHA_LIMITE, $n_horas, $grados, $N_POSTULACIONES, $objetivo, $descripcion)
    {
        global $conn;
        $sql_111 = "INSERT INTO TAREAS(ID_CREADOR, NOMBRE_TAREA, DESCRIPCION, FECHA_CREACION,FECHA_LIMITE, NUMERO_HORAS, OBJETIVO, PARA_QUE_GRADO, ESTADO_TAREA, N_PERSONAS)
        VALUE($id_creador,'$NOMBRE_TAREA','$descripcion',CURRENT_DATE(), '$FECHA_LIMITE', $n_horas, '$objetivo', '$grados', 'Activa', $N_POSTULACIONES)";

        $consul = mysqli_query($conn, $sql_111);

        if (!$consul) {
            return 0;
        } else {
            return 1;
        }
    }

    function Get_todas_las_tareas()
    {
        global $conn;
        $sql_tar = "SELECT * FROM TAREAS ORDER BY ESTADO_TAREA ASC;";
        $consult = mysqli_query($conn, $sql_tar);
        return $consult;
    }
}

if (isset($_SESSION['id_dir'])) {

    $id = $_SESSION['id_dir'];

    $Boss = new Directivo($id);

    // Terminar tarea
    if (isset($_POST['TerminarTarea'])) {

        $id_tarea_ter = $_POST['id_tarea'];

        $TERMINADA = $Boss->Set_terminar_tarea($id_tarea_ter, $id);

        if ($TERMINADA == 0) {

            $_SESSION['tituloDePerfilDir'] = "Error";
            $_SESSION['mensajeDePerfilDir'] = "EL proceso de terminación no a sido completado.";
            $_SESSION['tipoPerfilDir'] = "error";

            header("Location:../../../Vista/perfiles/directivo/perfil_directivo.php");
        } else {

            $modificacion = "Terminación de tarea N° $id_tarea_ter por el directivo n° $id; ";
            $Boss->Set_modificaciones($id, $modificacion);

            $Boss->Set_confirmar_horas($id_tarea_ter);
        }

        header("Location:../../../Vista/perfiles/directivo/perfil_directivo.php");
    }

    // Editar tareas
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
        $string = "Cambio a tarea N°  $id_tarea_editar!  - [ $NOMBRE_TAREA ,  $FECHA_LIMITE ,   $PARA_QUE_GRADO ,  $NUMERO_HORAS  ,  $N_PERSONAS ]";
        $respuesta = $Boss->Set_modificaciones($id, $string);

        if ($respuesta == 0) {
            $_SESSION['tituloDePerfilDir'] = "Error";
            $_SESSION['mensajeDePerfilDir'] = "EL proceso no a sido completado.";
            $_SESSION['tipoPerfilDir'] = "error";
        }

        header("Location:../../../Vista/perfiles/directivo/perfil_directivo.php");
    }

    // Eliminar Postulación
    if (isset($_POST['EliminarPostulacion'])) {

        $id_tarea_elim = $_POST['id_tarea_botones'];
        $id_postulado_elim = $_POST['id_postulado_botones'];

        $Boss->Set_Borrar_postulaciones($id_postulado_elim, $id_tarea_elim);
        $st_modif = "Se eliminó al estudiante [$id_postulado_elim] de la tarea [$id_tarea_elim]";
        $Boss->Set_modificaciones($id, $st_modif);
        
        header("Location:../../../Vista/perfiles/directivo/perfil_directivo.php");
    }
    
    // Desactivar postulación
    if (isset($_POST['DesactivarPostulacion'])) {

        $id_tarea_postulacion = $_POST['id_tarea_botones'];
        $id_postulado_postulacion = $_POST['id_postulado_botones'];
        $Boss->Set_estado_postulaciones($id_postulado_postulacion, $id_tarea_postulacion);

        $st_modif = "Se Modifico el estado al estudiante [$id_postulado_postulacion] de la tarea [$id_tarea_postulacion]";
        $Boss->Set_modificaciones($id, $st_modif);
        header("Location:../../../Vista/perfiles/directivo/perfil_directivo.php");
    }

    // Eliminar Tarea
    if (isset($_POST['EliminarTarea'])) {

        $id_tarea_eliminar = $_POST['id_tarea_elim'];
        $Boss->Borrar_postulaciones_totales($id_tarea_eliminar);
        $Boss->Borrar_tarea($id_tarea_eliminar);
        $Boss->Set_modificaciones($id, "Se eliminó la tarea $id_tarea_eliminar");

        header("Location:../../../Vista/perfiles/directivo/perfil_directivo.php");
    }

    // Crear Tarea
    if (isset($_POST['Crear_tarea'])) {
        $nombre_tarea = $_POST['nombre_tarea'];
        $fecha_limite = $_POST['fecha_limite'];
        $n_horas = $_POST['n_horas'];
        $grados = $_POST['grados'];
        $N_postulaciones = $_POST['N_postulaciones'];
        $objetivo = $_POST['objetivo'];
        $descripcion = $_POST['descripcion'];

        $rest = $Boss->Set_Crear_nueva_tarea($id, $nombre_tarea, $fecha_limite, $n_horas, $grados, $N_postulaciones, $objetivo, $descripcion);

        if ($rest != 0) {
            $_SESSION['mensajeDeCrearDir'] = "hecho";
            $_SESSION['tituloDeCrearDir'] = "Tarea publicada exitosamente.";
            $_SESSION['tipoCrearDir'] = "success";
        } else {
            $_SESSION['mensajeDeCrearDir'] = "Error ";
            $_SESSION['tituloDeCrearDir'] = " no se pudo publicar la tarea.";
            $_SESSION['tipoCrearDir'] = "error";
        }
        header("Location:../../../Vista/perfiles/directivo/crear_tarea.php");
    }

    header("../../../Vista/perfiles/directivo/perfil_directivo.php");
} else {

    header("Location:../../../index.php");

    $_SESSION['mensajeDeAlerta'] = "Por favor inicia sesión nuevamente.";
    $_SESSION['tituloDeAlerte'] = "warning";
    $_SESSION['tipoAlerta'] = "Reingreso fallido";
}
