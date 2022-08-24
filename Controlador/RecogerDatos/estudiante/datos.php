<?php
// extensiones del documento
include_once "../../../Modelo /conexion_db.php";

// Clases 
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
   function __construct($identidad, $nombres, $apellidos, $edad, $fecha_actual, $celular, $correo, $rol, $grado, $nombre_tecnica)
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

   function Ver_mis_datos()
   {
      echo "mostrar datos";
   }
   function Postularse_a_tarea()
   {
      echo "me ";
   }
   function Salir_de_tarea()
   {
   }
   function Ver_tarea()
   {
   }
   function Cerrar_sesion()
   {
   }
}


class Directivo extends Estudiante
{
   var $ocupacion;
   var $donde_labora;

   function __construct($identidad, $nombres, $apellidos, $edad, $fecha_actual, $celular, $correo, $rol, $ocupacion, $donde_labora)
   {
      $identidad = $identidad;
      $nombres = $nombres;
      $apellidos = $apellidos;
      $edad = $edad;
      $fecha_actual = $fecha_actual;
      $celular = $celular;
      $correo = $correo;
      $rol = $rol;
      $ocupacion = $ocupacion;
      $donde_labora = $donde_labora;
   }

   function Crear_tarea()
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
   $Estudiante = new Estudiante(
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

   $Estudiante->horasTotales = 12;

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

   // conteo de las que pertenezco y están activas
   $SQL12 = "SELECT COUNT(ID_TAREA) as TareasMia FROM POSTULADOS WHERE ID_POSTULADO = '$id' AND ESTADO_POSTULACION LIKE 'A%';";
   $result12 = mysqli_query($conn, $SQL12);
   $getResultado = mysqli_fetch_array($result12);
   $disponibles =  $getResultado['TareasMia'];

   // header("Location:../../../Vista/perfiles/estudiante/perfil_estudiante.php");
   //  include "../../../Vista/perfiles/estudiante/perfil_estudiante.php";
} else {
   echo "<script> alert(\"Se produjo un error al extraer los datos del estudiante, Carpeta:Controlador/RecogerDatos/estudiante/datos.php\")</script>";
   header("Location:../../../index.php");
}
