<?php


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
   var $identidad;
   var $nombres;
   var $apellidos;
   var $edad;
   var $fecha_actual;
   var $celular;
   var $correo;
   var $rol;
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

   function Crear_tarea(){
      
   }
}
