<?php

include "../../../Modelo/conexion_db.php";

$ida = $_SESSION['id_adm'];

class Admin
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

    function Admin($id)
    {
        global $conn;
        $sql_data = "SELECT * FROM ADMINS WHERE IDENTIDAD = '$id';";
        $consult = mysqli_query($conn, $sql_data);
        $result = mysqli_fetch_assoc($consult);

        $this->identidad = $id;
        $this->nombres = $result['NOMBRES'];
        $this->apellidos = $result['APELLIDOS'];
        $this->edad = $result['EDAD'];
        $this->fecha_registro = $result['FECHA_REGISTRO'];
        $this->celular = $result['CELULAR'];
        $this->correo = $result['CORREO'];
        $this->rol = $result['ROL'];
        $this->ocupacion = $result['OCUPACION'];
        $this->donde_labora = $result['DONDE_LABORA'];
    }
    function get_tareas()
    {
        global $conn;
        $sql_12 = "SELECT * FROM TAREAS ORDER BY ESTADO_TAREA ASC;";
        $consult = mysqli_query($conn, $sql_12);

        return $consult;
    }

    function Get_datos_del_postulado($id_tarea)
    {
        global $conn;
        $slq_8 = "SELECT * FROM POSTULADOS WHERE ID_TAREA = '$id_tarea' ORDER BY ESTADO_POSTULACION ASC;";
        $CONSULT_8 = mysqli_query($conn, $slq_8);
        return $CONSULT_8;
    }

    function Get_datos_del_estudiante($identidad)
    {
        global $conn;

        $sql_7 = "SELECT concat(NOMBRES,' ',APELLIDOS) as NOMBRES, IDENTIDAD as ID_E, GRADO  FROM ESTUDIANTES WHERE IDENTIDAD = '$identidad';";
        $CONSULT_7 = mysqli_query($conn, $sql_7);
        $rest = mysqli_fetch_array($CONSULT_7);

        return $rest;
    }

    function get_mis_datos($ida)
    {
        global $conn;
        $sql_data = "SELECT * FROM ADMINS WHERE IDENTIDAD = '$ida';";
        $consult = mysqli_query($conn, $sql_data);
        $result = mysqli_fetch_assoc($consult);
        return $result;
    }
    function get_mi_numero_de_modificaciones($ida)
    {
        global $conn;
        $sql_data = "SELECT COUNT(ID_MODIFICADOR) AS CONTEO_MODIFICACIONES FROM MODIFICACIONES WHERE ID_MODIFICADOR = '$ida';";
        $consult = mysqli_query($conn, $sql_data);
        $result = mysqli_fetch_assoc($consult);
        return $result['CONTEO_MODIFICACIONES'];
    }

    function get_directivos()
    {
        global $conn;
        $sql_1 = "SELECT * FROM TABLE DIRECTIVOS;";
        $consult_1 = mysqli_query($conn, $sql_1);
        return $consult_1;
    }

    function Get_estudiantes()
    {
        global $conn;
        $sql_2 = "SELECT * FROM ESTUDIANTES;";
        $consult_2 = mysqli_query($conn, $sql_2);
        return $consult_2;
    }

    function Get_busqueda_de_directivo($id_directivo)
    {
        global $conn;
        $sql_3 = "SELECT * FROM DIRECTIVOS WHERE IDENTIDAD = '$id_directivo';";
        $consult_3 = mysqli_query($conn, $sql_3);
        $result_3 = mysqli_fetch_array($consult_3);
        return $result_3;
    }


    function Get_busqueda_de_estudiante($id_estudiante)
    {
        global $conn;
        $sql_4 = "SELECT * FROM ESTUDIANTE WHERE IDENTIDAD = '$id_estudiante';";
        $consult_4 = mysqli_query($conn, $sql_4);
        $result_4 = mysqli_fetch_array($consult_4);
        return $result_4;
    }

    function Get_contar_los_postulados($id_tarea)
    {
        global $conn;
        $sql_11 = "SELECT COUNT(ID_POSTULADO) AS TOTAL FROM POSTULADOS WHERE ID_TAREA = '$id_tarea';";
        $CONSULT_11 = mysqli_query($conn, $sql_11);

        $result__11 = mysqli_fetch_array($CONSULT_11);

        $sql_10 = "SELECT  COUNT(ID_POSTULADO) AS ACTIVOS FROM POSTULADOS WHERE ID_TAREA = '$id_tarea' AND ESTADO_POSTULACION LIKE 'A%';";
        $CONSULT_10 = mysqli_query($conn, $sql_10);
        $result__10 = mysqli_fetch_array($CONSULT_10);


        $activos = $result__10['ACTIVOS'];
        $total = $result__11['TOTAL'];
        $inactivos = $total - $activos;

        $N_POSTULACIONES = array('ACTIVOS' => $activos, 'TOTALES' =>  $total, 'INACTIVOS' => $inactivos);

        return $N_POSTULACIONES;
    }

    function Get_egresados()
    {
    }

    function Set_cambiar_password_directivo($id_directivo, $newPassword)
    {
        $newPassSeguro = password_hash($newPassword, PASSWORD_BCRYPT, ['vueltas' => 30]);
        global $conn;
        $sql_5 = "UPDATE DIRECTIVOS SET CONTRA = '$newPassSeguro' WHERE IDENTIDAD = '$id_directivo';";
        $consult_5 = mysqli_query($conn, $sql_5);

        if (!$consult_5) {
            return 0;
        } else {
            return 1;
        }
    }

    function Set_cambiar_password_estudiante($id_estudiante, $newPassword)
    {
        $newPassSeguro = password_hash($newPassword, PASSWORD_BCRYPT, ['vueltas' => 30]);
        global $conn;
        $sql_6 = "UPDATE DIRECTIVOS SET CONTRA = '$newPassSeguro' WHERE IDENTIDAD = '$id_estudiante';";
        $consult_6 = mysqli_query($conn, $sql_6);

        if (!$consult_6) {
            return 0;
        } else {
            return 1;
        }
    }

    function Set_editar_directivos($id_directivo, $Array)
    {
        global $conn;
        $nombres = $Array[0];
        $apellidos = $Array[1];
        $edad = $Array[2];
        $correo = $Array[3];
        $celular = $Array[4];
        $ocupacion = $Array[5];
        $donde_labora = $Array[6];

        $sql_7 = "UPDATE DIRECTIVOS SET NOMBRES = '$nombres', APELLIDOS = '$apellidos', EDAD = '$edad', CORREO = '$correo',CELULAR = '$celular',
        OCUPACION = '$ocupacion', DONDE_LABORA = '$donde_labora'
        WHERE IDENTIDAD = '$id_directivo';";
        $consult_7 = mysqli_query($conn, $sql_7);
        if (!$consult_7) {
            return 0;
        } else {
            return 1;
        }
    }

    function Set_editar_estudiantes($id_estudiante, $Array)
    {
        global $conn;
        $nombres = $Array[0];
        $apellidos = $Array[1];
        $edad = $Array[2];
        $correo = $Array[3];
        $celular = $Array[4];
        $grado = $Array[5];
        $nombre_tecnica = $Array[6];

        $sql_7 = "UPDATE DIRECTIVOS SET NOMBRES = '$nombres', APELLIDOS = '$apellidos', EDAD = '$edad', CORREO = '$correo',CELULAR = '$celular',
        GRADO = '$grado', NOMBRE_TECNICA = '$nombre_tecnica'
        WHERE IDENTIDAD = '$id_estudiante';";
        $consult_7 = mysqli_query($conn, $sql_7);

        if (!$consult_7) {
            return 0;
        } else {
            return 1;
        }
    }

    function Set_egresar_estudiante($id_estudiante)
    {
        global $conn;
        // Obtener datos básicos
        $sql_8 = "SELECT * FROM ESTUDIANTES WHERE IDENTIDAD = '$id_estudiante';";
        $consult_8 = mysqli_query($conn, $sql_8);
        $DATOS_10 = mysqli_fetch_array($consult_8);

        $IDENTIDAD = $DATOS_10['IDENTIDAD'];
        $NOMBRES = $DATOS_10['NOMBRES'];
        $APELLIDOS = $DATOS_10['APELLIDOS'];
        $EDAD = $DATOS_10['EDAD'];
        $FECHA_REGISTRO = $DATOS_10['FECHA_REGISTRO'];
        $CELULAR = $DATOS_10['CELULAR'];
        $CORREO = $DATOS_10['CORREO'];
        $GRADO = $DATOS_10['GRADO'];
        $NOMBRE_TECNICA = $DATOS_10['NOMBRE_TECNICA'];
        $TYC = $DATOS_10['TYC'];

        // seleccionar horas

        $sql_9 = "SELECT COUNT(HORAS) AS HORAS FROM HORAS WHERE ID_ESTUDIANTE = '$id_estudiante';";
        $consult_9 = mysqli_query($conn, $sql_9);
        $horas = mysqli_fetch_array($consult_9);
        $totalHoras = $horas['HORAS'];

        $INSERTAR_RETIRADO = "INSERT INTO EGRESADOS (ID_EGRESADO, NOMBRES, APELLIDOS, EDAD, FECHA_REGISTRO, FECHA_RETIRO, CELULAR, CORREO, GRADO_CURSADO, NOMBRE_TECNICA, TOTAl_HORAS, TYC)
        VALUES ('$IDENTIDAD', '$NOMBRES', '$APELLIDOS', $EDAD, '$FECHA_REGISTRO', CURRENT_DATE(), '$CELULAR', '$CORREO', '$GRADO', '$NOMBRE_TECNICA', $totalHoras , '$TYC');";
        $egresado = mysqli_query($conn, $INSERTAR_RETIRADO);

        if (!$egresado) {
            return 0;
        } else {
            return 1;
        }
    }

    function Set_retirar_estudiante($id_estudiante)
    {
        global $conn;
        // Obtener datos básicos
        $sql_10 = "SELECT * FROM ESTUDIANTES WHERE IDENTIDAD = '$id_estudiante';";
        $consult_10 = mysqli_query($conn, $sql_10);
        $DATOS_10 = mysqli_fetch_array($consult_10);

        $IDENTIDAD = $DATOS_10['IDENTIDAD'];
        $NOMBRES = $DATOS_10['NOMBRES'];
        $APELLIDOS = $DATOS_10['APELLIDOS'];
        $EDAD = $DATOS_10['EDAD'];
        $FECHA_REGISTRO = $DATOS_10['FECHA_REGISTRO'];
        $CELULAR = $DATOS_10['CELULAR'];
        $CORREO = $DATOS_10['CORREO'];
        $GRADO = $DATOS_10['GRADO'];
        $NOMBRE_TECNICA = $DATOS_10['NOMBRE_TECNICA'];
        $TYC = $DATOS_10['TYC'];

        // seleccionar horas

        $sql_9 = "SELECT COUNT(HORAS) AS HORAS FROM HORAS WHERE ID_ESTUDIANTE = '$id_estudiante';";
        $consult_9 = mysqli_query($conn, $sql_9);
        $horas = mysqli_fetch_array($consult_9);
        $totalHoras = $horas['HORAS'];

        $INSERTAR_RETIRADO = "INSERT INTO RETIRADOS (ID_RETIRADO, NOMBRES, APELLIDOS, EDAD, FECHA_REGISTRO, FECHA_RETIRO, CELULAR, CORREO, GRADO_CURSADO, NOMBRE_TECNICA, TOTAl_HORAS, TYC)
        VALUES ('$IDENTIDAD', '$NOMBRES', '$APELLIDOS', $EDAD, '$FECHA_REGISTRO', CURRENT_DATE(), '$CELULAR', '$CORREO', '$GRADO', '$NOMBRE_TECNICA', $totalHoras, '$TYC');";
        $retirado = mysqli_query($conn, $INSERTAR_RETIRADO);

        if (!$retirado) {
            return 0;
        } else {
            return 1;
        }
    }
}

if (isset($_SESSION['id_adm'])) {

    $Ferxxo = new Admin($ida);
    $DataAdm = $Ferxxo->get_mis_datos($ida);
    $n_modificaciones = $Ferxxo->get_mi_numero_de_modificaciones($ida);





    header("../../../Vista/perfiles/_admin/perfil_admin.php");
} else {
    header("../../../index.php");
}
