<?php
include_once "Recibir_datos.php";
// cierre de sesiones
if (isset($_SESSION['id'])) {

    // variables del html
    $Mostrar = "show";
    $Mostrar = " ";
    $contador = 0;
    $id_collapse = 2;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="../../../Controlador/includes/recursos/faviivon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../../../Vista/custome_bootstrap/style.css">
        <title>Tareas</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body class="pt-5">
        <header class="container-fluid">
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

        <main class="mt-5 pt-3 px-4 px-sm-4">
            <!-- contenedor -->
            <div class="row border border-3 border-primary rounded">
                <!-- titulo superior -->
                <div class="bg-primary  text-center py-2  rounded-top mb-2">
                    <h6 class="text-light text-white-50 my-2">
                        Postulate a las tareas para terminar tus horas.
                    </h6>
                </div>
                <?php while ($contador <= 5) {
                    $ides = "tareasN_" . $id_collapse;
                ?>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-2">
                        <div class="border border-2 border-dark rounded-3 p-0">
                            <a class="nav-link p-0 m-0" data-bs-toggle="collapse" data-bs-target="#<?php echo $ides; ?>" aria-expanded="false" aria-controls="<?php echo $ides; ?>">
                                <div class="bg-secondary border-bottom border-1 border-dark text-center py-2">
                                    <h6 class="text-dark"><b><?php echo "Regar las macetas del jardín."; ?></b></h6>
                                </div>
                            </a>
                            <!-- <div class="mx-2 collapse show " id="perfil"> ///////////////////////////////// -->
                            <div class="mx-2 collapse bg-light <?php echo $Mostrar; ?>" id="<?php echo $ides; ?>">







                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xx-3 col-xl-4 ">
                                    <div class=" border border-3 border-<?php echo $color ?> bg-secondary rounded-3 mb-2">
                                        <div class="row px-2 mt-1">
                                            <!-- nombre tarea -->
                                            <div class="col text-danger">
                                                <h6><b class=" bg-opacity-100 rounded px-1"><?php echo "Limpiar el jardín"; ?></b></h4>
                                            </div>
                                            <!-- estado de tarea -->
                                            <div class="col text-end">
                                                <p><b><?php echo "Activa "; ?><i class="text-<?php echo $color; ?> fa-solid fa-circle"></i></b></p>
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <!-- Nombre creador de tarea -->
                                            <div class="col  text-center ">
                                                <h6 class="small"><i>De <?php echo " Nancy Ramirez"; ?></i></h6>
                                            </div>
                                            <!-- fecha creación -->
                                            <div class="col  text-center ">
                                                <h6><i class="small fa-solid fa-calendar-days"><i> <?php echo "2022-08-23"; ?></i></i></h6>
                                            </div>
                                        </div>
                                        <!-- input group -->
                                        <div class="row px-3">
                                            <div class="col-12 text-center">
                                                <div class="row">
                                                    <div class="col pt-2">
                                                        <i class="border border-1 small border-warning bg-warning rounded p-1 fa-solid fa-clock"><b> <?php echo 5; ?> h</b></i>
                                                    </div>
                                                    <div class="col">
                                                        <button type="button" class="btn btn-outline-dark border-0 rounded-pill btn-sm my-1" data-bs-toggle="modal" data-bs-target="#infoTareas">
                                                            <i class="fa-solid fa-circle-info"> <i class="small"> Detalles.</i></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade " id="infoTareas" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable  modal-lg" role="document">
                                                        <div class="modal-content rounded-3 border-<?php echo "primary"; ?> border-4 ">
                                                            <!-- header -->
                                                            <div class="modal-header bg-<?php echo "primary"; ?>">
                                                                <h5 class="modal-title  text-light"><b><?php echo "Limpiar el jardín"; ?></b></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <!-- body -->
                                                            <div class="modal-body">
                                                                <div class="mx-sm-2">
                                                                    <div class="row">
                                                                        <!-- titular de la tarea -->
                                                                        <div class="col-8  text-start">
                                                                            <h6><i class="fa-solid fa-user-tag"><i> <?php echo "Mercedes coordinadora" ?></i></i></h6>
                                                                        </div>
                                                                        <!-- estado de la tarea -->
                                                                        <div class="col">
                                                                            <p><b class="border rounded bg-secondary p-1 "><?php echo "Activa "; ?><i class="text-<?php echo $color; ?> fa-solid fa-circle"></i></b></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <!-- titular de la tarea -->
                                                                        <div class="col-8  text-start">
                                                                            <h6 class=" p-1"><i class=" fa-solid fa-calendar-days"><b class="ms-2 text-decoration-line-through"> <?php echo "2022-08-23"; ?></b></i> hasta <b class="text-decoration-underline ">2022-08-29</b></h6>
                                                                        </div>
                                                                        <!-- estado de la tarea -->
                                                                        <div class="col px-md-5">
                                                                            <div class="col-12 input-group border-0">
                                                                                <!-- horas -->
                                                                                <span class="input-group-text bg-body border-0">
                                                                                    <i class=" fa-solid fa-clock "><b> <?php echo 5; ?> h</b></i>
                                                                                </span>
                                                                                <!-- Grupos -->
                                                                                <span class=" input-group-text bg-body border-0">
                                                                                    <i class=" fa-solid fa-users-line "><b> <?php echo "11°"; ?></b></i>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mx-2 text-start mt-4">
                                                                        <!-- descripción -->
                                                                        <div class="col-12 border-1 border bg-secondary px-2 mb-3 rounded-3 ">
                                                                            <h6 class="text-danger"><b>DESCRIPCIÓN.</b></h6>
                                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae autem, sit, doloremque eos doloribus corrupti quod a vero perspiciatis fugiat quas commodi vitae esse animi veritatis quia libero modi iusto!</p>
                                                                        </div>
                                                                        <!-- Objetivo -->
                                                                        <div class="col-12 border-1 border bg-secondary rounded-3 ">
                                                                            <h6 class="text-danger"><b>OBJETIVO.</b></h6>
                                                                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum quasi optio eos ab molestias doloribus adipisci. Veritatis, placeat eius sunt </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- footer -->
                                                            <div class="modal-footer bg-<?php echo "primary"; ?>">
                                                                <button type="button" class="btn btn-outline-secondary small btn-sm rounded-pill" data-bs-dismiss="modal">Cerrar</button>
                                                                <button type="button" class="btn btn-success small btn-sm rounded-pill" data-bs-dismiss="modal">Postularse</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>













                            
                            <!-- /////////////////////////////////////////////////// -->
                        </div>
                    </div>
                <?php $contador++;
                    $id_collapse++;
                } ?>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>

    <!-- Cierre de sesión por medio de las mismas. -->
<?php

} else {
    header("Location:../../../Controlador/formulariosDatos/inicio_sesion.php");

    $_SESSION['mensajeInicio'] = "Por favor inicia sesión nuevamente.";
    $_SESSION['tipoAlertaInicio'] = "warning";
    $_SESSION['tituloInicio'] = "Reingreso fallido";
}  ?>