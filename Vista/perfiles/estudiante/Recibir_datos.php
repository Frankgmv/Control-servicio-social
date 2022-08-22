<?php

include_once "../../../Modelo/conexion_db.php";

// Mostrar tareas disponibles.

$SQL =  "SELECT * FROM TAREAS;";
$result3 = mysqli_query($conn, $SQL);
// $GetResult3 = mysqli_fetch_array($result3);
$num = mysqli_num_rows($result3);

// print_r($GetResult3);

echo $num;
// print_r($GetResult3);

// foreach ($GetResult3 as $key => $value) {
//   echo $key . "  " . $value . " <br>";
// }



// $datosEstudiante = $_SESSION['vector'];

// foreach ($_SESSION['vector'] as $key => $value) {
// $ha =  $key . " == " . $value . " <br>";
// }




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>nada</title>
</head>

<body >
  <table border="1">
    <thead>

      <tr>
        <td>ID TAREA</td>
        <td>ID CREADOR</td>
        <td>NOMBRE TAREA</td>
        <td>DESCRIPCIÓN</td>
        <td>FECHA CREACIÓN</td>
        <td>FECHA LIMITE</td>
        <td>NUMERO_HORAS</td>
        <td>OBJETIVO</td>
        <td>PARA QUE GRADO</td>
        <td>ESTADO TAREA</td>
        <td>NÚMERO PERSONAS</td>
      </tr>
    </thead>
    <tbody>
    <?php
    while($mostrar = mysqli_fetch_array($result3)){
    
    ?>
    <tr>
      <td><?php echo $mostrar['ID_TAREA'];?></td>
      <td><?php echo $mostrar['ID_CREADOR'];?></td>
      <td><?php echo $mostrar['NOMBRE_TAREA'];?></td>
      <td><?php echo $mostrar['DESCRIPCION'];?></td>
      <td><?php echo $mostrar['FECHA_CREACION'];?></td>
      <td><?php echo $mostrar['FECHA_LIMITE'];?></td>
      <td><?php echo $mostrar['NUMERO_HORAS'];?></td>
      <td><?php echo $mostrar['OBJETIVO'];?></td>
      <td><?php echo $mostrar['PARA_QUE_GRADO'];?></td>
      <td><?php echo $mostrar['ESTADO_TAREA'];?></td>
      <td><?php echo $mostrar['N_PERSONAS'];?></td> 
    </tr>  
    <?php
     }
    ?>
    </tbody>
  </table>

</body>

</html>