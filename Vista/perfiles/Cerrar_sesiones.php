<?php
session_start();

unset($_SESSION['id']);
unset($_SESSION['id_dir']);

$_SESSION['mensajeDeAlerta'] = "Cierre de credenciales.";
$_SESSION['tituloDeAlerte'] = "Cierre sesión";
$_SESSION['tipoAlerta'] = "success";

header("Location:../../index.php");

?>