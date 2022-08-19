<?php
include_once "Recibir_datos.php";

// cierre de sesiones
if (isset($_SESSION['id'])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="../../../Controlador/includes/recursos/faviivon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../../../Vista/custome_bootstrap/style.css">
        <title>Perfil</title>
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
                            <a class=" text-light nav-link active d-sm-inline  d-md-inline  text-black-50" title="Perfil" href="#"><i class="fa-solid fa-circle-user" title="Perfil"></i></a>
                        </li>
                        <li class="nav-item text-start mx-2 h2">
                            <a class="text-light nav-link active d-sm-inline d-md-inline text-opacity-75" href="tareas.php" title="Tareas"><i class="fa-solid fa-book"></i></a></a>
                        </li>
                        <li class="nav-item text-start mx-2 h2">
                            <a class="text-light nav-link active d-sm-inline d-md-inline text-opacity-75" href="../Cerrar_sesiones.php" title="Cerrar sesión"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Contenido principal -->
        <main class="mt-5 pt-3 px-sm-2">
            <!-- mostrar campo de prueba -->
            <div class="d-none col-6 offset-5">
                <?php
                foreach ($_SESSION['vector'] as $key => $value) {
                    echo $key . " == " . $value . " <br>";
                }

                ?>
            </div>

            <!-- style next to the comment -->
            <div class="border border-4 border-primary rounded-3">
                <a class="nav-link p-0 m-0" data-bs-toggle="collapse" href="#perfil" aria-expanded="false" aria-controls="perfil">
                    <div class="bg-primary border-bottom border-3 border-primary text-center py-2">
                        <h2 class="text-light text-white-50"><i class="small fa-solid fa-user-ninja"></i> <b class="text-light">DATOS PERSONALES <?php echo ""; ?></b> <i class=" small fa-solid fa-user-ninja"></i>
                        </h2>
                    </div>
                </a>
                <!-- <div class="mx-2 collapse show " id="perfil"> -->
                <div class="mx-2 collapse show" id="perfil">
                    <!-- hilera 1 -->
                    <div class="row my-sm-3">
                        <!-- Nombres -->
                        <div class="col-12 col-sm-6 col-md-5 offset-md-1 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0">Nombres </span>
                                <input type="text" value="<?php echo "Frank Giovany"; ?>" class=" border-0 form-control rounded-4 text-center" readonly>
                            </div>
                        </div>
                        <!-- Apellidos -->
                        <div class="col-12 col-sm-6 col-md-5 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0">Apellidos </span>
                                <input type="text" value="<?php echo "Muriel Velásquez"; ?>" class="border-0 form-control rounded-4 text-center" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- hilera 2 -->
                    <div class="row my-sm-3">
                        <!-- Identidad -->
                        <div class="col-12 col-sm-4 col-md-4 offset-md-1 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0"><i class="fa-solid fa-address-card"></i></span>
                                <input type="text" value="<?php echo "1011689172"; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                        <!-- Fecha de registro -->
                        <div class="col-12 col-sm-4 col-md-3 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0 "><i class="fa-solid fa-calendar-days"></i></span>
                                <input type="text" value="<?php echo "22-8-22"; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                        <!-- grado -->
                        <div class="col-12 col-sm-4 col-md-3 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0 ">Grado</span>
                                <input type="text" value="<?php echo "10°"; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- hilera 3 -->
                    <div class="row my-sm-3">
                        <!-- celular -->
                        <div class="col-12 col-sm-6 offset-sm-1 col-lg-5 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0 "><i class="fa-solid fa-phone"></i></span>
                                <input type="text" value="<?php echo "30420403033"; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                        <div class="d-none d-lg-block col-2  text-center">
                            <span class="border-0 h4"><i class="fa-solid fa-face-grin-beam-sweat"></i></span>
                        </div>
                        <!-- horas totales -->
                        <div class="col-12 col-sm-4 col-lg-3  mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0 "><i class="fa-solid fa-clock"><b> Horas</b></i></span>
                                <input type="text" value="<?php echo "12"; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>

                    </div>
                    <!-- hilera 4 -->
                    <div class="row my-sm-3">
                        <!-- Media técnica -->
                        <div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-2  mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0 "><i class="fa-solid fa-chalkboard-user"><b> Técnica</b></i></span>
                                <input type="text" value="<?php echo "Desarrollo de software"; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                        <!-- Correo -->
                        <div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-0 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0 "><i class="fa-solid fa-at"></i></span>
                                <input type="text" value="<?php echo "giovanyvelasquez200523@gmail.com"; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Tareas del estudiante. -->
            <div class="border border-4 border-primary rounded-3 mt-1">
                <a class="nav-link p-0 m-0" data-bs-toggle="collapse" href="#tareas" aria-expanded="false" aria-controls="tareas">
                    <div class="bg-primary border-bottom border-3 border-primary text-center py-2">
                        <h2 class="text-white-50"><i class="fa-solid fa-book"></i><b class="text-light"> Mis tareas<?php echo ""; ?></b>
                        </h2>
                    </div>
                </a>
                <div class="mx-1 my-2 collapse show " id="tareas">
                    <div class="row">
                        <?php $variable = 0;
                        while ($variable <= 10) { ?>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xx-3 col-xl-4 ">
                                <div class=" border border-3 border-<?php echo $color ?> bg-secondary rounded-3 mb-1">
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
                                    <div class="row px-2">
                                        <div class="col-6 offset-3  text-center">
                                            <i class=" border border-1 border-warning bg-warning rounded p-1 me-3 fa-solid fa-clock"><b> <?php echo 5; ?></b></i>
                                            <button type="button" class="btn btn-outline border-0 rounded-circle btn-lg input-group-text" data-bs-toggle="modal" data-bs-target="#infoTareas">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </button>
                                            <div class="modal fade" id="infoTareas" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">modal-sm</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                        </div>
                                                        <div class="modal-body">
                                                            Body
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $variable++;
                        } ?>
                    </div>
                </div>
            </div>
            <a href="tareas.php" class="d-block btn btn-outline-primary mt-1 mb-3 border-0 "><i class="fa-solid fa-book"><b> Ver tareas para hacer</b></i></a>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>

<?php
} else {

    header("Location:../../../index.php");
    // include "../../../index.php";
    $_SESSION['mensajeDeAlerta'] = "Por favor inicia sesión nuevamente.";
    $_SESSION['tipoAlerta'] = "warning";
    $_SESSION['tituloDeAlerte'] ="Ingreso fallido";

} ?>