<?php

include_once "../../../Modelo/conexion_db.php";
// Variable de prueba

    foreach ($_SESSION['vector'] as $key => $value) {
      $ha =  $key . " == " . $value . " <br>";
    }
?>