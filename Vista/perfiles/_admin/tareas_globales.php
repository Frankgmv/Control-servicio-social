<?php
require "../../../Controlador/RecogerDatos/_admin/datos.php";

if (isset($_SESSION['id_adm'])) {
    $ida = $_SESSION['id_adm'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="../../includes/recursos/faviivon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../../../Vista/custome_bootstrap/style.css">
        <title>Tareas globales</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body class="pt-4 mt-4">
        <header class="container-fluid ">
            <nav class="container-fluid navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
                <a class="navbar-brand" href="info_general.php">
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
                            <a class=" text-light nav-link active d-sm-inline  d-md-inline  text-opacity-75" title="Perfil" href="perfil_admin.php"><i class="fa-solid fa-circle-user" title="Perfil"></i></a>
                        </li>
                        <li class="nav-item text-start mx-2 h2">
                            <a class=" text-light nav-link active d-sm-inline  d-md-inline  text-black-50" title="Perfil" href="tareas_globales.php"><i class="fa-solid fa-book" title="Tareas Globales"></i></a>
                        </li>
                        <li class="nav-item text-start mx-2 h2">
                            <a class=" text-light nav-link active d-sm-inline  d-md-inline  text-opacity-75" title="Perfil" href="info_general.php"><i class="fa-solid fa-info-circle" title="Información general"></i></a>
                        </li>
                        <li class="nav-item text-start mx-2 h2">
                            <a class=" text-light nav-link active d-sm-inline  d-md-inline text-opacity-75" title="Perfil" href="usuarios.php"><i class="fa-solid fa-users" title="Usuarios"></i></a>
                        </li>
                        <li class="nav-item text-start mx-2 h2">
                            <a class="text-light nav-link active d-sm-inline d-md-inline text-opacity-75" href="../Cerrar_sesiones.php" title="Cerrar sesión"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Contenido principal -->
        <main class="mt-5 pt-4 px-sm-2">
            <div class=" mt-3">
                <div class="row">
                    <?php
                    $variable = 0;
                    $result5 = $Ferxxo->get_tareas();
                    while ($tareas = mysqli_fetch_array($result5)) {
                        // IDS DEL MODAL
                        $id_Eliminar = "Modal_Eliminar_" . $variable;
                        $id_Editar = "Modal_Editar_" . $variable;
                        $id_Ver = "Modal_Ver_" . $variable;
                        $id_modal2 = "modal_postulados_" . $variable;
                        $id_terminar = "modal_terminar_" . $variable;

                        // El estado de la tarea para los colores
                        if (strtoupper($tareas['ESTADO_TAREA']) == "TERMINADA") {
                            $color = "success";
                            $modal_color = " ";
                            $modal_text = " ";
                            $disable = "d-none";
                            $disable = "disabled";
                            $hidden = "hidden";
                        } else {
                            $hidden = " ";
                            $disable = " ";
                            $modal_color = " ";
                            $modal_text = " ";
                            $color = "warning";
                        }
                        // cuantos postulados activos hay a la tarea
                        $N_postulados = $Ferxxo->Get_contar_los_postulados($tareas['ID_TAREA']);
                        // Datos de los postulados activos
                    ?>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 col-xl-4 ">
                            <div class=" border border-3 border-<?php echo $color; ?> bg-secondary rounded-3 mb-3">
                                <div class=" text-center py-1 bg-<?php echo $color; ?>">
                                    <h6 class="text-center  text-light text-capitalize"><b><?php echo $tareas['NOMBRE_TAREA']; ?></b></h4>
                                </div>
                                <!-- fechas y postulados -->
                                <div class="row mb-1 mt-2">
                                    <div class="col-8  small ">
                                        <div class="col ps-2 d-flex justify-content-sm-around flex-column flex-sm-row justify-content-between align-items-center">
                                            <h6 class="text-primary"><i class="small fa-solid fa-calendar-days"><i> <?php echo $tareas['FECHA_CREACION']; ?></i></i></h6>
                                            <h6 class="text-danger"><i class="small fa-solid fa-calendar-days"><i> <?php echo $tareas['FECHA_LIMITE']; ?></i></i></h6>
                                        </div>
                                    </div>
                                    <div class="col text-center d-flex justify-content-center align-items-center d-sm-block">
                                        <b class="rounded border border-<?php echo "dark"; ?> border-1 bg-<?php echo $color; ?>"><i class="ms-1 fa-solid fa-user-clock"><b class="border-start border-1 border-dark ps-2 mx-2"><?php echo $N_postulados['TOTALES']; ?></b></i></b>
                                    </div>
                                </div>
                                <!-- objetivo -->
                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="m-1 m-sm-2 px-2">
                                            <h6 class="text-danger small "><b>Objetivo.</b></h6>
                                            <p class="P-1 text-black small  "><?php echo $tareas['OBJETIVO']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Botones -->
                                <div class="row mb-1  mx-1 mx-sm-4">
                                    <div class="col mt-0 p-0 d-flex justify-content-between align-items-start">
                                        <div class="mt-2">
                                            <p><b class=" border border-2 rounded-pill  p-1 border-<?php echo $color; ?> text-capitalize"><?php echo $tareas['ESTADO_TAREA']; ?><i class="text-<?php echo $color; ?> ms-1 fa-solid fa-circle"></i></b></p>
                                        </div>
                                        <div class="  small  rounded-pill mt-0 ">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#<?php echo $id_Ver; ?>" class="btn rounded-circle btn-outline-primary border-0"><i class="fa-solid fa-eye small"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- MODAL PARA VER -->
                            <div class="modal fade " id="<?php echo $id_Ver; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable   modal-lg" role="document">
                                    <div class="modal-content rounded-3 border-primary border-4 ">
                                        <!-- header -->
                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title  text-light"><b><?php echo $tareas['NOMBRE_TAREA']; ?></b></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <!-- body -->
                                        <div class="modal-body">
                                            <div class="mx-sm-2">
                                                <div class="row">
                                                    <div class=" d-flex justify-content-between justify-content-md-around">
                                                        <p><b class="border rounded bg-secondary p-1 text-capitalize"><?php echo $tareas['ESTADO_TAREA'];; ?><i class="text-<?php echo $color; ?> ms-1 fa-solid fa-circle"></i></b></p>
                                                        <p> <i class="fa-solid fa-user-clock"></i> <b>N° Personas</b> <?php echo $tareas['N_PERSONAS']; ?></p>
                                                        <span class="input-group-text input-group-sm bg-secondary border-0 rounded text-<?php echo $color; ?>">
                                                            <i class=" fa-solid fa-user-group "><b class="ms-1 text-capitalize"><b class="text-dark">Grupos </b><label class="text-danger"> <?php echo $tareas['PARA_QUE_GRADO']; ?></label></b></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <h6 class="col mb-2 d-flex justify-content-between justify-content-md-around mt-2">
                                                        <b class=" text-primary me-1"><b class="text-center text-dark d-block mb-1">Fecha inicio</b> <i class="fa-solid fa-calendar-days"></i> <?php echo $tareas['FECHA_CREACION']; ?></b>
                                                        <b class="  me-1"><b class="text-center text-dark d-block mb-1">Pago</b> <i class="fa-solid fa-stopwatch"></i class="text-dark"> <?php echo $tareas['NUMERO_HORAS'] . " h"; ?></b>
                                                        <b class="ps-1 text-danger"><b class="text-center text-dark d-block mb-1">Fecha fin</b> <i class="fa-solid fa-calendar-days"></i> <?php echo $tareas['FECHA_LIMITE']; ?></b>
                                                    </h6>
                                                </div>

                                                <div class="row mx-2 text-start mt-4 ">
                                                    <!-- descripción -->
                                                    <div class="col-12 border-1 border bg-secondary px-2 mb-3 rounded-3 ">
                                                        <h6 class="text-danger"><b>DESCRIPCIÓN.</b></h6>
                                                        <p><?php echo $tareas['DESCRIPCION']; ?></p>
                                                    </div>
                                                    <!-- Objetivo -->
                                                    <div class="col-12 border-1 border bg-secondary rounded-3 ">
                                                        <h6 class="text-danger"><b>OBJETIVO.</b></h6>
                                                        <p><?php echo $tareas['OBJETIVO']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- footer -->
                                        <div class="modal-footer bg-primary">
                                            <form action="../../../Controlador/RecogerDatos/directivo/datos.php" method="POST">
                                                <!-- <form action="" method="POST"> -->
                                                <input type="hidden" name="id_user" value="<?php echo $id; ?>">
                                                <input type="hidden" name="id_tarea" value="<?php echo $tareas['ID_TAREA']; ?>">
                                                <button type="button" class="btn btn-outline-success bg-dark small btn-sm " data-bs-dismiss="modal"><b>Cerrar</b></button>
                                                <button type="button" class="btn  btn-outline-success bg-dark small btn-sm" data-bs-toggle="modal" data-bs-target="#<?php echo $id_modal2; ?>"><i class="fa-solid fa-user-check"> <b> Postulados</b></i></button>
                                                <!-- modal ver postulados -->
                                                <div class=" modal fade mt-5 pt-5 " id="<?php echo $id_modal2; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $id_modal2; ?>" aria-hidden="true">
                                                    <div class="modal-dialog  px-2 modal-lg modal-dialog-scrollable modal-backdrop" role="document mt-5">
                                                        <div class="modal-content  border border-4 border-danger mb-5">
                                                            <div class="modal-header bg-danger">
                                                                <h5 class="modal-title text-light   "><b>Estudiantes Postulados.</b></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h6 class="text-center"><i class="text-success fa-solid fa-circle"> <b><?php echo "Activos " . $N_postulados['ACTIVOS']; ?></b></i> <b class="mx-2">|</b><i class="text-danger fa-solid fa-circle"> <b><?php echo "Inactivos " . $N_postulados['INACTIVOS']; ?></b></i></h6>
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>GRADO</th>
                                                                            <th>NOMBRES</th>
                                                                            <th>POSTULACIÓN</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <!-- TODO solucionar el problema de la obtención del  id del usuario -->
                                                                        <?php
                                                                        $info_postulacion = $Ferxxo->Get_datos_del_postulado($tareas['ID_TAREA']);
                                                                        while ($datos_postulacion = mysqli_fetch_array($info_postulacion)) {

                                                                            $datos = $Ferxxo->Get_datos_del_estudiante($datos_postulacion['ID_POSTULADO']);

                                                                            if (strtoupper($datos_postulacion['ESTADO_POSTULACION']) == "ACTIVA") {
                                                                                $postulad__ = "success";
                                                                            } else {
                                                                                $postulad__ = "danger";
                                                                            };

                                                                        ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <p class="d-inline border border-secondary bg-secondary px-1 rounded-5 small"><?php echo "<b>" . $datos['GRADO'] . "</b>"; ?><i class="text-<?php echo $postulad__; ?> ms-1 fa-solid fa-circle"></i></p>
                                                                                </td>
                                                                                <!-- <td><?php $datos['NOMBRES'] . " " . $datos['APELLIDOS']; ?></td> -->
                                                                                <td><?php echo $datos['NOMBRES']; ?></td>
                                                                                <td><?php echo $datos_postulacion['FECHA_POSTULACION']; ?></td>
                                                                            </tr>
                                                                        <?php   } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $variable++;
                    } ?>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous ">
        </script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <?php if (isset($_SESSION['mensajeDePerfilDir'])) { ?>

            <script>
                swal("<?php print $_SESSION['tituloDePerfilDir']; ?>", " <?php print $_SESSION['mensajeDePerfilDir']; ?> "
                    <?php if (isset($_SESSION['tipoPerfilDir'])) { ?>, "<?php print $_SESSION['tipoPerfilDir']; ?>"
                    <?php } ?>
                );
            </script>
        <?php unset($_SESSION['mensajeDePerfilDir'], $_SESSION['tituloDePerfilDir'], $_SESSION['tipoPerfilDir']);
        } ?>
    </body>

    </html>

<?php
} else {

    $_SESSION['mensajeDeAlerta'] = "Por favor inicia sesión nuevamente.";
    $_SESSION['tituloDeAlerte'] = "Reingreso fallido";
    $_SESSION['tipoAlerta'] = "warning";

    header("Location:../../../index.php");
} ?>