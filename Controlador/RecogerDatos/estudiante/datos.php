<?php
include_once "../../../Modelo /conexion_db.php";

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
   function Estudiante($identidad, $nombres, $apellidos, $edad, $fecha_actual, $celular, $correo, $rol, $grado, $nombre_tecnica)
   {
      $identidad = $identidad;
      $nombres = $nombres;
      $apellidos = $apellidos;
      $edad = $edad;
      $fecha_actual = $fecha_actual;
      $celular = $celular;
      $correo = $correo;
      $rol = $rol;
      $grado = $grado;
      $nombre_tecnica = $nombre_tecnica;
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

   function Postularse_a_tarea($id_estudiante, $id_tarea)
   {
      global $conn;
      // Verificación
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
   }
   function Anular_postulacion($id_estudiante, $id_tarea)
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

   function ACuantasPertenezco($id_estudiante)
   {
      // conteo de las tareas a las que pertenezco y están activas
      global $conn;
      // conteo de las que pertenezco y están activas
      $SQL12 = "SELECT COUNT(ID_TAREA) as TareasMia FROM POSTULADOS WHERE ID_POSTULADO = '$id_estudiante' AND ESTADO_POSTULACION LIKE 'A%';";
      $result12 = mysqli_query($conn, $SQL12);
      $getResultado = mysqli_fetch_array($result12);
      $disponibles =  $getResultado['TareasMia'];

      return $disponibles;
   }

   function Ver_tarea()
   {
   }
   function Cerrar_sesion()
   {
   }
}



$id = $_SESSION['id'];

if (isset($_SESSION['id'])) {

   // Seleccionar datos de la tabla estudiante.

   $datosPersonales = "SELECT IDENTIDAD, NOMBRES, APELLIDOS, EDAD, FECHA_REGISTRO, CELULAR, CORREO, ROL, GRADO, NOMBRE_TECNICA FROM ESTUDIANTES WHERE IDENTIDAD = $id;";
   $RetornoDatosPersonales = mysqli_query($conn, $datosPersonales);
   $DatosPerfil = mysqli_fetch_assoc($RetornoDatosPersonales);

   $vector = [];

   foreach ($DatosPerfil as $key => $value) {
      $vector[$key] = $value;
   }

   // Creando instancia estudiante
   $Pepito = new Estudiante(
      $id,
      $DatosPerfil['NOMBRES'],
      $DatosPerfil['APELLIDOS'],
      $DatosPerfil['EDAD'],
      $DatosPerfil['FECHA_REGISTRO'],
      $DatosPerfil['CELULAR'],
      $DatosPerfil['CORREO'],
      $DatosPerfil['ROL'],
      $DatosPerfil['GRADO'],
      $DatosPerfil['NOMBRE_TECNICA'],
   );

   $Pepito->horasTotales = 12;

   $_SESSION['vector'] = $vector;
   // Vector con los datos base del estudiante.
   $datosEstudiante = $_SESSION['vector'];

   $id = $datosEstudiante['IDENTIDAD'];

   // CONEXIÓN HABILITADA PARA EL DOCUMENTO DE TAREAS Y ESTUDIANTES.
   $connN = $conn;

   // Seleccionar tareas ACTIVAS.
   // $SQL =  "SELECT * FROM TAREAS WHERE ESTADO_TAREA LIKE \"A%\" OR \"T%\" ;";
   $SQL =  "SELECT * FROM TAREAS ORDER BY  ESTADO_TAREA  ;";
   $result3 = mysqli_query($conn, $SQL);
   $num = mysqli_num_rows($result3);

   // CONTEO DE TAREAS ACTIVAS.
   $SQL2 = "SELECT COUNT(ESTADO_TAREA) as Activas FROM TAREAS WHERE ESTADO_TAREA LIKE \"A%\";";
   $result4 = mysqli_query($conn, $SQL2);
   $ConteoDeActivas = mysqli_fetch_array($result4);

   //TODO total de horas que lleva el estudiante.


   //Tareas a las cuales esta postulado.
   $SQL5 = "SELECT * FROM POSTULADOS WHERE ID_POSTULADO = '$id';";
   $result5 = mysqli_query($conn, $SQL5);
} else {
   echo "<script> alert(\"Se produjo un error al extraer los datos del estudiante, Carpeta:Controlador/RecogerDatos/estudiante/datos.php\")</script>";
}
