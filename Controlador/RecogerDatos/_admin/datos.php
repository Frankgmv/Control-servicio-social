<?php 

include "../../../Modelo/conexion_db.php";

$id = $_SESSION['id'];

echo $id;

header("../../../Vista/perfiles/_admin/perfil_admin.php");