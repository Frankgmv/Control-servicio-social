<?php
session_start();

$_SESSION['connAdmin'] = $connAdmin = mysqli_connect('localhost', 'root', 'frank2022','control_servicio_social');

$_SESSION['connEstudiante'] = $connEstudiante = mysqli_connect('localhost', 'estudiante', 'estudiante','control_servicio_social');

$_SESSION['connDirectivo'] = $connDirectivo = mysqli_connect('localhost', 'directivo', 'directivo','control_servicio_social');

// // Conexión en PDO
// $DDBB ="control_servicio_social";
// $user = "root";
// $server =  "mysql:dbname=$DDBB;host:127.0.0.1";
// $pass = "frank2022";

// try{
//     $pdo  = new PDO($server,$user, $pass);
//     $_SESSION['conexion'] = "Conectado";
    
// }catch(PDOException $e){

//     $_SESSION['conexion'] = "Conexión fallida: ".$e -> getMessage();

// }

// echo " ".$_SESSION['conexion']." ";
// ?>