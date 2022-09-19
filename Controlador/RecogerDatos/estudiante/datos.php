<?php
include_once "../../../Modelo/conexion_db.php";
class Estudiante
{

   var $identidad;
   var $nombres;
   var $apellidos;
   var $edad;
   var $fecha_actual;
   var $celular;
   var $correo;
   var $rol;
   var $grado;
   var $nombre_tecnica;
   var $horasTotales;

   // Propiedades 
   function Estudiante($identidad)
   {
      global $conn;
      // Obtener mis datos personales.
      $datosPersonales = "SELECT IDENTIDAD, NOMBRES, APELLIDOS, EDAD, FECHA_REGISTRO, CELULAR, CORREO, ROL, GRADO, NOMBRE_TECNICA FROM ESTUDIANTES WHERE IDENTIDAD = $identidad;";
      $RetornoDatosPersonales = mysqli_query($conn, $datosPersonales);
      $DatosPerfil = mysqli_fetch_assoc($RetornoDatosPersonales);

      $this->identidad = $DatosPerfil['IDENTIDAD'];
      $this->nombres = $DatosPerfil['NOMBRES'];
      $this->apellidos = $DatosPerfil['APELLIDOS'];
      $this->edad = $DatosPerfil['EDAD'];
      $this->fecha_actual = $DatosPerfil['FECHA_REGISTRO'];
      $this->celular = $DatosPerfil['CELULAR'];
      $this->correo = $DatosPerfil['CORREO'];
      $this->rol = $DatosPerfil['ROL'];
      $this->horasTotales = 0;
      $this->grado = $DatosPerfil['GRADO'];
      $this->nombre_tecnica = $DatosPerfil['NOMBRE_TECNICA'];
   }

   // métodos
   function Get_mis_datos($id)
   {
      global $conn;
      $sql_1 = "SELECT * FROM ESTUDIANTES WHERE IDENTIDAD = '$id';";
      $consult_1 = mysqli_query($conn, $sql_1);
      $result_1 = mysqli_fetch_array($consult_1);
      return $result_1;
   }

   function Set_postularse_a_tarea($id_estudiante, $id_tarea, $grado)
   {
      global $conn;
      // Verificación
      $SQLquery11 = "SELECT GRADO FROM ESTUDIANTES WHERE IDENTIDAD = '$id_estudiante';";
      $consulta11 = mysqli_query($conn, $SQLquery11);
      $verificar11 = mysqli_fetch_array($consulta11);

      if ($grado == $verificar11['GRADO'] or strtoupper($grado) == "TODOS") {

         $SQLquery0 = "SELECT ESTADO_POSTULACION FROM POSTULADOS WHERE ID_TAREA = '$id_tarea' AND ID_POSTULADO = '$id_estudiante';";
         $consulta0 = mysqli_query($conn, $SQLquery0);
         $verificar = mysqli_fetch_array($consulta0);


         if (!$verificar) {
            // Insertar
            $SQLquery1 = "INSERT INTO POSTULADOS(ID_POSTULADO, ID_TAREA, FECHA_POSTULACION, ESTADO_POSTULACION) VALUES ('$id_estudiante', '$id_tarea',CURRENT_DATE(), 'ACTIVA');";
            $consulta1 = mysqli_query($conn, $SQLquery1);

            if (!$consulta1) {
               return 0;
            } else {
               return 1;
            }
         } elseif (strtoupper($verificar['ESTADO_POSTULACION']) == 'INACTIVA') {
            // reactiva la postulación 
            $SLQ10 = "UPDATE POSTULADOS SET ESTADO_POSTULACION = 'ACTIVA' WHERE ID_POSTULADO = '$id_estudiante' AND ID_TAREA = '$id_tarea';";
            $query3 = mysqli_query($conn, $SLQ10);

            if (!$query3) {
               return 2;
            } else {
               return 3;
            }
         } else {
            return 4;
         }
      } else {
         return 5;
      }
   }
   function Set_anular_postulacion($id_estudiante, $id_tarea)
   {
      global $conn;

      // obtener el estado de postulación
      $SLQ8 = "SELECT ESTADO_POSTULACION FROM POSTULADOS WHERE ID_POSTULADO = '$id_estudiante' AND ID_TAREA = '$id_tarea';";
      $query2 = mysqli_query($conn, $SLQ8);
      $result8 = mysqli_fetch_array($query2);

      // verificar si esta inactivo para no repetirlo de nuevo
      if (strtoupper($result8['ESTADO_POSTULACION']) == 'ACTIVA') {

         $SLQ9 = "UPDATE POSTULADOS SET ESTADO_POSTULACION = 'INACTIVA' WHERE ID_POSTULADO = '$id_estudiante' AND ID_TAREA = '$id_tarea';";
         $result9 = mysqli_query($conn, $SLQ9);
         if (!$result9) {
            return 0;
         } else {
            return 1;
         }
      } else {
         return 2;
      }
   }

   function GetACuantasPertenezco($id_estudiante)
   {
      // conteo de las tareas a las que pertenezco y están activas
      global $conn;
      $SQL12 = "SELECT COUNT(ID_TAREA) as TareasMia FROM POSTULADOS WHERE ID_POSTULADO = '$id_estudiante' AND ESTADO_POSTULACION LIKE 'A%';";
      $result12 = mysqli_query($conn, $SQL12);
      $getResultado = mysqli_fetch_array($result12);
      $disponibles =  $getResultado['TareasMia'];

      return $disponibles;
   }

   function Get_tareas_activas()
   {
      global $conn;
      // CONTEO DE TAREAS ACTIVAS.
      $SQL2 = "SELECT COUNT(ESTADO_TAREA) as Activas FROM TAREAS WHERE ESTADO_TAREA LIKE \"A%\";";
      $result4 = mysqli_query($conn, $SQL2);
      $ConteoDeActivas = mysqli_fetch_array($result4);
      return $ConteoDeActivas['Activas'];
   }
   function Get_mis_tareas($id_estudiante)
   {
      //Tareas a las cuales esta postulado.
      global $conn;
      $SQL5 = "SELECT * FROM POSTULADOS WHERE ID_POSTULADO = '$id_estudiante';";
      $resultYa = mysqli_query($conn, $SQL5);
      return $resultYa;
   }

   function Get_tareas_totales()
   {
      global $conn;
      // $SQL =  "SELECT * FROM TAREAS WHERE ESTADO_TAREA LIKE \"A%\" OR \"T%\" ;";
      $SQL =  "SELECT * FROM TAREAS ORDER BY  ESTADO_TAREA;";
      $result3 = mysqli_query($conn, $SQL);
      return  $result3;
   }

   function Get_mis_horas($id)
   {
      //TODO total de horas que lleva el estudiante.
      global $conn;
      $sql_2 = "SELECT SUM(HORAS) AS HORAS FROM HORAS WHERE ID_ESTUDIANTE = '$id';";
      $consult_2 = mysqli_query($conn, $sql_2);
      $result_2 = mysqli_fetch_array($consult_2);

      $horasTotales = $result_2['HORAS'];
      $this->horasTotales = $horasTotales;
      if ($horasTotales != 0) {
         return $horasTotales;
      } else {
         return 0;
      }
   }
} 

if (isset($_SESSION['id'])) {

   $id = $_SESSION['id'];

   // Obtener mis datos personales.
   $datosPersonales = "SELECT IDENTIDAD, NOMBRES, APELLIDOS, EDAD, FECHA_REGISTRO, CELULAR, CORREO, ROL, GRADO, NOMBRE_TECNICA FROM ESTUDIANTES WHERE IDENTIDAD = $id;";
   $RetornoDatosPersonales = mysqli_query($conn, $datosPersonales);
   $DatosPerfil = mysqli_fetch_assoc($RetornoDatosPersonales);

   $Pepito = new Estudiante($id);

   $id = $_SESSION['id'];
   $connN = $conn;

   // FUNCIONES OPERATIVAS DE LAS TAREAS
   function EstoyPostulado($id_tarea)
   {
      // Los datos de la tarea a la cual estoy postulado
      global $conn;
      $SQL6 = "SELECT * FROM TAREAS WHERE ID_TAREA = '$id_tarea';";
      $result6 = mysqli_query($conn, $SQL6);
      $mis_tareas = mysqli_fetch_array($result6);
      return $mis_tareas;
   }

   function NombreCreadorTarea($id_creador)
   {  
      global $conn;
      $SQL7 = "SELECT CONCAT(NOMBRES,' ', APELLIDOS) AS NOMBRES FROM DIRECTIVOS WHERE IDENTIDAD = '$id_creador';";
      $queryC = mysqli_query($conn, $SQL7);
      $CreadorDeTarea = mysqli_fetch_array($queryC);
      return $CreadorDeTarea;
   }
   function EstoyActivo($id, $id_tarea)
   {
      // REVISAR SI ESTOY ACTIVO
      global $conn;
      $SLQ11 = "SELECT ESTADO_POSTULACION as ESTADO FROM POSTULADOS WHERE ID_POSTULADO = '$id' AND ID_TAREA = '$id_tarea';";
      $consl = mysqli_query($conn, $SLQ11);
      $resultado = mysqli_fetch_array($consl);
      return $resultado['ESTADO'];
   }
   
} else {
   header("Location:../../../Controlador/formulariosDatos/inicio_sesion.php");
   $_SESSION['mensajeInicio'] = "Por favor inicia sesión nuevamente.";
   $_SESSION['tipoAlertaInicio'] = "warning";
   $_SESSION['tituloInicio'] = "Sesión fallida";
}
