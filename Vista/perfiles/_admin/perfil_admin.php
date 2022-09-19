<?php
require "../../../Controlador/RecogerDatos/_admin/datos.php";

// cierre de sesiones


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
        <title><?php echo $DataAdm['NOMBRES'] . " Admin"; ?></title>
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
                            <a class=" text-light nav-link active d-sm-inline  d-md-inline  text-black-50" title="Perfil" href="perfil_admin.php"><i class="fa-solid fa-circle-user" title="Perfil"></i></a>
                        </li>
                        <li class="nav-item text-start mx-2 h2">
                            <a class=" text-light nav-link active d-sm-inline  d-md-inline  text-opacity-75" title="Perfil" href="tareas_globales.php"><i class="fa-solid fa-book" title="Tareas Globales"></i></a>
                        </li>
                        <li class="nav-item text-start mx-2 h2">
                            <a class=" text-light nav-link active d-sm-inline  d-md-inline  text-opacity-75" title="Perfil" href="info_general.php"><i class="fa-solid fa-info-circle" title="Información general"></i></a>
                        </li>
                        <li class="nav-item text-start mx-2 h2">
                            <a class=" text-light nav-link active d-sm-inline  d-md-inline  text-opacity-75" title="Perfil" href="usuarios.php"><i class="fa-solid fa-users" title="Usuarios"></i></a>
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
                <div class="mx-2 collapse show" id="perfil">
                    <!-- <div class="mx-2 collapse show " id="perfil"> -->
                    <!-- hilera 1 -->
                    <div class="row my-sm-3">
                        <!-- Nombres -->
                        <div class="col-12 col-sm-6 col-md-5 offset-md-1 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0"><b>Nombres</b> </span>
                                <input type="text" value="<?php echo $DataAdm['NOMBRES']; ?>" class=" border-0 form-control rounded-4 text-center" readonly>
                            </div>
                        </div>
                        <!-- Apellidos -->
                        <div class="col-12 col-sm-6 col-md-5 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0"><b>Apellidos</b> </span>
                                <input type="text" value="<?php echo $DataAdm['APELLIDOS']; ?>" class="border-0 form-control rounded-4 text-center" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- hilera 2 -->
                    <div class="row my-sm-3">
                        <!-- Identidad -->
                        <div class="col-12 col-sm-6 col-md-5 offset-md-1 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0"><i class="fa-solid fa-address-card"></i></span>
                                <input type="text" value="<?php echo $DataAdm['IDENTIDAD']; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                        <!-- Fecha de registro -->
                        <div class="col-12 col-sm-6 col-md-5 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0 "><i class="fa-solid fa-calendar-days"></i></span>
                                <input type="text" value="<?php echo $DataAdm['FECHA_REGISTRO']; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                        <!-- grado -->
                        <div class="d-none col-12 col-sm-4 col-md-3 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0 "><i class="fa-solid fa-address-book"><b> Mis Modificaciones</b></i></span>
                                <input type="text" value="<?php echo $n_modificaciones; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- hilera 3 -->
                    <div class="row my-sm-3">
                        <!-- Media técnica -->
                        <div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-2  mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0 "><i class="fa-solid fa-chalkboard-user"><b>
                                            Ocupación</b></i></span>
                                <input type="text" value="<?php echo $DataAdm['OCUPACION']; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                        <!-- Correo -->
                        <div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-0 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0 "><i class="fa-solid fa-at"> <b>correo</b></i></span>
                                <input type="text" value="<?php echo $DataAdm['CORREO']; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- hilera 4 -->
                    <div class="row my-sm-3">
                        <!-- celular -->
                        <div class="col-12 col-sm-6 offset-sm-1 col-lg-5 mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-0 "><i class="fa-solid fa-address-book"><b> Mis Modificaciones</b></i></span>
                                <input type="text" value="<?php echo $n_modificaciones; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
                        <div class="d-none d-lg-block col-2  text-center">
                            <span class="border-0 h4 text-secondary"><i class="fa-solid fa-face-grin-beam-sweat"></i></span>
                        </div>
                        <!-- horas totales -->
                        <div class="col-12 col-sm-4 col-lg-3  mb-2">

                            <div class="input-group">
                                <span class="input-group-text border-0 "><i class="fa-solid fa-phone"></i></span>
                                <input type="text" value="<?php echo $DataAdm['CELULAR']; ?>" class=" border-0 form-control text-center" readonly>
                            </div>
                        </div>
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

        <?php if (isset($_SESSION['mensajeDePerfilAdm'])) { ?>

            <script>
                swal("<?php print $_SESSION['tituloDePerfilAdm']; ?>", " <?php print $_SESSION['mensajeDePerfilAdm']; ?> "
                    <?php if (isset($_SESSION['tipoPerfilAdm'])) { ?>, "<?php print $_SESSION['tipoPerfilAdm']; ?>"
                    <?php } ?>
                );
            </script>
        <?php unset($_SESSION['mensajeDePerfilAdm'], $_SESSION['tituloDePerfilAdm'], $_SESSION['tipoPerfilAdm']);
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