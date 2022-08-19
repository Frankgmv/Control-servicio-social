<?php
session_start();

unset($_SESSION['id']);


$_SESSION['mensajeInicio'] = "Sesión Cerrada exitosamente.";
$_SESSION['tipoAlertaInicio'] = "success";
$_SESSION['tituloInicio'] = "Cerrar sesión";

header("Location:../../Controlador/formulariosDatos/inicio_sesion.php");
// include "../../Controlador/formulariosDatos/inicio_sesion.php";
?>