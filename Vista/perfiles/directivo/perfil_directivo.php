<?php
require "../../../Controlador/RecogerDatos/directivo/datos.php";

// cierre de sesiones
if (isset($_SESSION['id_dir'])) {
    $idt = $_SESSION['id_dir'];
    $DataDir = $Boss->Get_mis_datos($idt);
    $HorasYTareas = $Boss->Get_numero_de_tareas_y_horas($idt);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="../../includes/recursos/faviivon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../../../Vista/custome_bootstrap/style.css">
        <title><?php echo $DataDir['NOMBRES']; ?></title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body class="pt-4 mt-4">
        <header class="container-fluid ">
            <nav class="container-fluid navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
                <a class="navbar-brand" href="tareas.php">
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
                            <a class=" text-light nav-link active d-sm-inline  d-md-inline  text-opacity-75" title="Perfil" href="#"><i class="fa-solid fa-circle-plus" title="añadir tarea"></i></a>
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
        <main class="mt-5 pt-4 px-sm-2">
            <div class="border border-4 border-primary rounded-3">
                <a class="nav-link p-0 m-0 " data-bs-toggle="collapse" data-bs-target="#perfil" aria-expanded="false" aria-controls="perfil">
                    <div class="bg-primary border-bottom border-3 border-primary text-center py-2">
                        <h2 class="text-light text-white-50"><i class="small fa-solid fa-user-ninja"></i> <b class="text-light">DATOS PERSONALES</b> <i class=" small fa-solid fa-user-ninja"></i>
                        </h2>
                    </div>
                </a>
                <div class="mx-2 collapse " id="perfil">
                    <!-- <div class="mx-2 collapse show " id="perfil"> -->
                    <!-- hilera 1 -->
                    <div class="row my-sm-3">
                        <!-- Nombres -->
                        <div class="col-12 col-sm-6 col-md-5 offset-md-1 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0"><b>Nombres</b> </span>
                                <input type="text" value="<?php echo $DataDir['NOMBRES']; ?>" class=" border-0 form-control rounded-4 text-center" readonly>
                            </div>
                        </div>
                        <!-- Apellidos -->
                        <div class="col-12 col-sm-6 col-md-5 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0"><b>Apellidos</b> </span>
                                <input type="text" value="<?php echo $DataDir['APELLIDOS']; ?>" class="border-0 form-control rounded-4 text-center" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- hilera 2 -->
                    <div class="row my-sm-3">
                        <!-- Identidad -->
                        <div class="col-12 col-sm-4 col-md-4 offset-md-1 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0"><i class="fa-solid fa-address-card"></i></span>
                                <input type="text" value="<?php echo $DataDir['IDENTIDAD']; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                        <!-- Fecha de registro -->
                        <div class="col-12 col-sm-4 col-md-3 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0 "><i class="fa-solid fa-calendar-days"></i></span>
                                <input type="text" value="<?php echo $DataDir['FECHA_REGISTRO']; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                        <!-- grado -->
                        <div class="col-12 col-sm-4 col-md-3 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0 "><i class="fa-solid fa-address-book"><b> Tareas
                                            Creadas</b></i></span>
                                <input type="text" value="<?php echo $HorasYTareas['TOTAL_TAREAS']; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- hilera 3 -->
                    <div class="row my-sm-3">
                        <!-- celular -->
                        <div class="col-12 col-sm-6 offset-sm-1 col-lg-5 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0 "><i class="fa-solid fa-phone"></i></span>
                                <input type="text" value="<?php echo $DataDir['CELULAR']; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                        <div class="d-none d-lg-block col-2  text-center">
                            <span class="border-0 h4 text-secondary"><i class="fa-solid fa-face-grin-beam-sweat"></i></span>
                        </div>
                        <!-- horas totales -->
                        <div class="col-12 col-sm-4 col-lg-3  mb-2">
                            <div class="input-group">
                                <!-- TODO extraer las horas del totales -->
                                <span class="input-group-text border-0 "><i class="fa-solid fa-clock"><b> Cuantas
                                        </b></i></span>
                                <input type="text" value="<?php echo $HorasYTareas['TOTAL_HORAS']; ?> h" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- hilera 4 -->
                    <div class="row my-sm-3">
                        <!-- Media técnica -->
                        <div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-2  mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0 "><i class="fa-solid fa-chalkboard-user"><b>
                                            Ocupación</b></i></span>
                                <input type="text" value="<?php echo $DataDir['OCUPACION']; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                        <!-- Correo -->
                        <div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-0 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0 "><i class="fa-solid fa-at"> <b>correo</b></i></span>
                                <input type="text" value="<?php echo $DataDir['CORREO']; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Tareas del estudiante. -->
            <div class="border border-4 border-primary rounded-3 mt-3">
                <a class="nav-link p-0 m-0" data-bs-toggle="collapse" href="#tareas" aria-expanded="false" aria-controls="tareas">
                    <div class="bg-primary border-bottom border-3 border-primary text-center py-2">
                        <h2 class="text-white-50"><i class="fa-solid fa-book"></i><b class="text-light"> Tareas Creadas</b>
                        </h2>
                    </div>
                </a>
                <div class="mx-1 my-2 collapse show " id="tareas">
                    <div class="row">
                        <?php
                        $variable = 0;
                        $result5 = $Boss->Get_mis_tarea($idt);
                        while ($tareasPorMi = mysqli_fetch_array($result5)) {
                            // IDS DEL MODAL
                            $id_modal = "Modal_N_" . $variable;
                            $id_modal2 = "Modal_N2_" . $variable;

                            if (strtoupper($tareasPorMi['ESTADO_TAREA']) == "TERMINADA") {
                                $color = "success";
                                $modal_color = " ";
                                $modal_text = " ";
                                $disable = "d-none";
                                $disable = "disabled";
                            } else {
                                $disable = " ";
                                $modal_color = " ";
                                $modal_text = " ";
                                $color = "warning";
                            }


                            // cuantos postulados hoy a la tarea

                            // El estado de la tarea para los colores



                            // foreach ($tareasPorMi as $key => $value) {
                            // echo "$key :: $value  <br>";
                            // }

                        ?>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 col-xl-4 ">
                                <div class=" border border-3 border-<?php echo $color; ?> bg-secondary rounded-3 mb-3">
                                    <div class=" text-center py-1 bg-<?php echo $color; ?>">
                                        <h6 class="text-center  text-light text-capitalize"><b><?php echo $tareasPorMi['NOMBRE_TAREA']; ?></b></h4>
                                    </div>
                                    <!-- fechas y postulados -->
                                    <div class="row mb-1 mt-2">
                                        <div class="col-8  small ">
                                            <div class="col ps-2 d-flex justify-content-sm-around flex-column flex-sm-row justify-content-between align-items-center">
                                                <h6 class="text-primary"><i class="small fa-solid fa-calendar-days"><i> <?php echo $tareasPorMi['FECHA_LIMITE']; ?></i></i></h6>
                                                <h6 class="text-danger"><i class="small fa-solid fa-calendar-days"><i> <?php echo $tareasPorMi['FECHA_LIMITE']; ?></i></i></h6>
                                            </div>
                                        </div>
                                        <div class="col text-center d-flex justify-content-center align-items-center d-sm-block">
                                            <b class="rounded border border-<?php echo "dark"; ?> border-1 bg-<?php echo $color; ?>"><i class="ms-1 fa-solid fa-user-clock"><b class="border-start border-1 border-dark ps-2 mx-2"><?php echo "12"; ?></b></i></b>
                                        </div>
                                    </div>
                                    <!-- objetivo -->
                                    <div class="row mb-1">
                                        <div class="col">
                                            <div class="m-1 m-sm-2 px-2">
                                                <h6 class="text-danger small "><b>Objetivo.</b></h6>
                                                <p class="P-1 text-black small  "><?php echo $tareasPorMi['OBJETIVO']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Botones -->
                                    <div class="row mb-1  mx-1 mx-sm-4">
                                        <div class="col mt-0 p-0 d-flex justify-content-between align-items-start">
                                            <div class="mt-2">
                                                <p><b class=" border border-2 rounded-pill  p-1 border-<?php echo $color; ?> text-capitalize"><?php echo $tareasPorMi['ESTADO_TAREA']; ?><i class="text-<?php echo $color; ?> ms-1 fa-solid fa-circle"></i></b></p>
                                            </div>
                                            <div class=" border-2 small border border-<?php echo $color;?> rounded-pill mt-0 ">
                                                <button <?php echo $disable;?> class="btn rounded-circle btn-outline-danger border-0"><i class=" fa-solid fa-trash-can small"></i></button>
                                                <button <?php echo $disable;?> class="btn rounded-circle btn-outline-success border-0"><i class="fa-solid fa-pencil small"></i></button>
                                                <button  class="btn rounded-circle btn-outline-primary border-0"><i class="fa-solid fa-eye small"></i></button>
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
    header("Location:../../../Controlador/formulariosDatos/inicio_sesion.php");

    $_SESSION['mensajeInicio'] = "Por favor inicia sesión nuevamente.";
    $_SESSION['tipoAlertaInicio'] = "warning";
    $_SESSION['tituloInicio'] = "Reingreso ";
} ?>