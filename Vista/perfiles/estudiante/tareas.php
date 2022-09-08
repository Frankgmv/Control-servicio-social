<?php
require "../../../Controlador/RecogerDatos/estudiante/datos.php";

// cierre de sesiones
if (isset($_SESSION['id'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="../../includes/recursos/faviivon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../../../Vista/custome_bootstrap/style.css">
        <title>Tareas</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <!-- d-none -->

    <body class="pt-5 mt-2 mt-md-0">
        <header class="container-fluid ">
            <nav class="container-fluid navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
                <a class="navbar-brand" href="#">
                    <div class="row ">
                        <div class="col-auto text-start d-inline">
                            <img src="../../../Controlador/includes/recursos/img-cabecera.png" class="i" width="auto" height="80" alt="logo sistema">
                        </div>
                        <h4 class="col-auto d-flex  align-items-center justify-content-start p-0 m-0 text-capitalize">
                            <strong class="d-none d-sm-block"><em> control de servicio social.</em></strong>
                            <strong class="d-block d-sm-none"><em> Control de S.</em></strong>
                        </h4>
                    </div>
                </a>
                <button class="navbar-toggler me-4" data-bs-target="#navegacion" data-bs-toggle="collapse" aria-controls="navegacion" aria-expanded="false" aria-label="menu de navegacion">
                    <span class=" navbar-toggler-icon"></span>
                </button>
                <div id="navegacion" class=" justify-content-sm-end collapse navbar-collapse">
                    <ul class="h4 navbar-nav  mt-3 list-group-horizontal justify-content-end">
                        <li class="nav-item text-start mx-2 h2">
                            <a class=" text-light nav-link active d-sm-inline  d-md-inline  text-opacity-75" title="Perfil" href="perfil_estudiante.php"><i class="fa-solid fa-circle-user" title="Perfil"></i></a>
                        </li>
                        <li class="nav-item text-start mx-2 h2">
                            <a class="text-light nav-link active d-sm-inline d-md-inline text-black-50 " href="#" title="Tareas"><i class="fa-solid fa-book"></i></a></a>
                        </li>
                        <li class="nav-item text-start mx-2 h2">
                            <a class="text-light nav-link active d-sm-inline d-md-inline text-opacity-75" href="../Cerrar_sesiones.php" title="Cerrar sesión"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Contenido principal -->

        <main class="mt-5 pt-3 px-3 px-sm-4">
            <!-- contenedor -->
            <div class="row border border-3 border-primary rounded">
                <!-- titulo superior -->
                <div class="bg-primary  text-center py-2  rounded-top mb-2">
                    <h6 class="text-light text-white-50 my-2">
                        Postulate cualquiera de las <?php echo $Pepito->Get_tareas_activas(); ?> tareas activas para completar tus horas.
                    </h6>

                </div>
                <?php
                $contador = 0;
                $id_collapse = 2;
                $result3 = $Pepito->Get_tareas_totales();
                while ($TAREA = mysqli_fetch_array($result3)) {
                    // variables operadores de código 
                    $ID_TAREA = $TAREA['ID_TAREA'];

                    $ides = "tareasN_" . $id_collapse;

                    // Obtener el nombre del creador
                    $getCreador = $TAREA['ID_CREADOR'];
                    $SQL1 = "SELECT CONCAT(NOMBRES,' ', APELLIDOS) AS NOMBRES FROM DIRECTIVOS WHERE IDENTIDAD = '$getCreador';";
                    $query = mysqli_query($connN, $SQL1);
                    $CreadorTarea = mysqli_fetch_array($query);

                    // $Conocer_postulados 
                    $SQL3 = "SELECT COUNT(ESTADO_POSTULACION) AS POSTULADOS FROM POSTULADOS WHERE ESTADO_POSTULACION LIKE 'A%' AND ID_TAREA = '$ID_TAREA';";
                    $query1 = mysqli_query($connN, $SQL3);

                    $EST_POSTULADOS = mysqli_fetch_array($query1);

                    // verificar el número de estudiantes postulados
                    if ($EST_POSTULADOS['POSTULADOS'] < $TAREA['N_PERSONAS']) {
                        $fondo = "secondary";
                        $color = "success";
                        $disable = " ";
                        $icono = " fa-circle-plus ";
                    } else {
                        $icono = " fa-xmark ";
                        $fondo = "primary";
                        $color = "warning";
                        $disable = "disabled";
                    }

                    if (strtolower($TAREA['ESTADO_TAREA']) == "terminada") {
                        $icono = " fa-xmark ";
                        $disable = "disabled";
                        $mostrar = " ";
                        $fondo = "success";
                    } else {
                        $mostrar = "show";
                        $fondo = "warning";
                    }

                    // Preguntar si esta postulado
                    $id_est = $_SESSION['id'];
                    $SQLquery4 = "SELECT ESTADO_POSTULACION FROM POSTULADOS WHERE ID_TAREA = '$ID_TAREA' AND ID_POSTULADO = '$id_est';";
                    $consulta44 = mysqli_query($connN, $SQLquery4);
                    $verificacion = mysqli_fetch_array($consulta44);

                    if ($verificacion) {
                        if (strtoupper($verificacion['ESTADO_POSTULACION']) == 'ACTIVA') {
                            $disable = "disabled";
                            $icono = "fa-check ";
                        }
                    }


                ?>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-2 ">
                        <div class="border border-2  border-dark rounded-3 p-0">
                            <a class="nav-link p-0 m-0 " data-bs-toggle="collapse" data-bs-target="#<?php echo $ides; ?>" aria-expanded="false" aria-controls="<?php echo $ides; ?>">
                                <div class=" border-bottom border-2 border-<?php echo $fondo; ?> text-center py-2 bg-<?php echo $fondo; ?> ">
                                    <h6 class="text-light"><b><?php echo $TAREA['NOMBRE_TAREA']; ?></b></h6>

                                </div>
                            </a>
                            <div class=" collapse bg-light  <?php echo $mostrar; ?> " id="<?php echo $ides; ?>">
                                <div class="mx-2 mx-sm-2 my-3 ">
                                    <div class="row ">
                                        <!-- titular de la tarea -->
                                        <div class="col-8 ps-4 pb-0  text-start  ">
                                            <h6>
                                                <p class=" text-success d-inline"><i class="fa-solid fa-user-tag"> </i></p> <b class=" text-capitalize"> <?php echo $CreadorTarea['NOMBRES'];  ?></b>
                                            </h6>
                                        </div>
                                        <!-- estado de la tarea -->
                                        <div class="col  pb-0">
                                            <p><b class="border rounded bg-secondary p-1 text-capitalize"><?php echo $TAREA['ESTADO_TAREA']; ?><i class="ms-1 text-<?php echo $color ?> fa-solid fa-circle"></i></b></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 px-4">
                                            <h6 class=" mb-2 d-flex justify-content-between justify-content-md-around">
                                                <b class=" text-primary me-1"><b class="text-center text-dark d-block mb-1">Fecha inicio</b> <i class="fa-solid fa-calendar-days"></i> <?php echo $TAREA['FECHA_CREACION']; ?></b>
                                                <b class="ps-1 text-danger"><b class="text-center text-dark d-block mb-1">Fecha fin </b> <i class="fa-solid fa-calendar-days"></i> <?php echo $TAREA['FECHA_LIMITE']; ?></b>
                                            </h6>
                                        </div>
                                        <!-- estado de la tarea -->
                                        <div class="col px-md-5 d-flex justify-content-around align-items-center">
                                            <!-- horas -->
                                            <span class=" border border-1 p-1 rounded-pill bg-secondary">
                                                <div class="mx-2">
                                                    <p class="d-inline text-success"><i class=" fa-solid fa-clock"></i></p><b> <?php echo $TAREA['NUMERO_HORAS']; ?> h</b>
                                                </div>
                                            </span>
                                            <!-- Grupos -->
                                            <span class=" border border-1 p-1  rounded-pill bg-secondary">
                                                <div class="mx-2">
                                                    <p class="d-inline text-success "><i class=" fa-solid fa-users-line"> <b>Grupo </b></i></p> <b class="ms-2 text-capitalize    "> <?php echo $TAREA['PARA_QUE_GRADO']; ?></b>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mx-2 text-start mt-4">
                                        <!-- descripción -->
                                        <div class="col-12 border-1 border bg-secondary  px-2 mb-3 rounded-3 ">
                                            <h6 class="text-danger mt-2"><b>DESCRIPCIÓN.</b></h6>
                                            <p><?php echo $TAREA['DESCRIPCION']; ?></p>
                                        </div>
                                        <!-- Objetivo -->
                                        <div class="col-12 border-1 border bg-secondary rounded-3 ">
                                            <h6 class="text-danger mt-2"><b>OBJETIVO.</b></h6>
                                            <p><?php echo $TAREA['OBJETIVO']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <form action="Postulaciones.php" method="POST">
                                    <div class="d-flex justify-content-around align-items-center " style="background-color: #008080 ;">
                                        <label title="Número de estudiantes postulados a <?php echo $TAREA['NOMBRE_TAREA']; ?>" class="text-light"><i class="fa-solid fa-users"></i> <b class="ms-2"><?php echo  $EST_POSTULADOS['POSTULADOS'] . " / " . $TAREA['N_PERSONAS']; ?> POSTULADOS</b></label>
                                        <input type="hidden" name="id_tarea" required readonly value="<?php echo $TAREA['ID_TAREA']; ?>">
                                        <input type="hidden" name="id_estudiantes" required readonly value="<?php echo $_SESSION['id']; ?>">
                                        <input type="hidden" name="PARA_QUE_GRADO" required readonly value="<?php echo $TAREA['PARA_QUE_GRADO']; ?>">
                                        <div class="d-flex- justify-content-end">
                                            <button type="submit" name="Postularse" <?php echo $disable; ?> class=" btn btn-outline-light my-2 me-4 rounded-pill btn-sm"><i class=" fa-solid <?php echo $icono; ?> "> <b>Postularse</b></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                    $id_collapse++;
                } ?>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <?php if (isset($_SESSION['mensajeDeTareas'])) { ?>

            <script>
                swal("<?php print $_SESSION['tituloDeTareas']; ?>", " <?php print $_SESSION['mensajeDeTareas']; ?> "
                    <?php if (isset($_SESSION['tipoTareas'])) { ?>, "<?php print $_SESSION['tipoTareas']; ?>"
                    <?php } ?>
                );
            </script>
        <?php unset($_SESSION['mensajeDeTareas'], $_SESSION['tituloDeTareas'], $_SESSION['tipoTareas']);
        } ?>

    </body>

    </html>

    <!-- Cierre de sesión por medio de las mismas. -->
<?php

} else {
    
    $_SESSION['mensajeDeAlerta'] = "Por favor inicia sesión nuevamente.";
    $_SESSION['tituloDeAlerte'] = "warning";
    $_SESSION['tipoAlerta'] = "Reingreso fallido";
    header("Location:../../../index.php");
}  ?>