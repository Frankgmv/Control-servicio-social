<?php
session_start();

unset($_SESSION['id']);

$_SESSION['mensajeInicio'] = "Cerraste de sesión";
$_SESSION['tipoAlertaInicio'] = "success";
$_SESSION['tituloInicio'] = " ";

header("Location:../../Controlador/formulariosDatos/inicio_sesion.php");
?>