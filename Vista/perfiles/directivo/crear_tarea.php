<?php
require "../../../Controlador/RecogerDatos/directivo/datos.php";

// cierre de sesiones
if (isset($_SESSION['id_dir'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="../../includes/recursos/faviivon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../../../Vista/custome_bootstrap/style.css">
        <title>Crear tarea</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="pt-3 mt-5">
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
                            <a class=" text-light nav-link active d-sm-inline  d-md-inline text-opacity-75" title="Perfil" href="perfil_directivo.php"><i class="fa-solid fa-circle-user" title="Perfil"></i></a>
                        </li>
                        <li class="nav-item text-start mx-2 h2">
                            <a class=" text-light nav-link active d-sm-inline  d-md-inline text-black-50" title="Perfil" href="crear_tarea.php"><i class="fa-solid fa-circle-plus" title="añadir tarea"></i></a>
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
        <main class="mt-5 pb-5 container">
            <form class="row mx-1 bg-secondary rounded border border-3 border-primary" action="../../../Controlador/RecogerDatos/directivo/datos.php" method="POST">
                <div class="text-center bg-primary text-light">
                    <h4 class=" my-2 d-none d-sm-block">Creador de tareas estudiantiles</h4>
                    <h4 class=" my-2 d-block d-sm-none">Creador de tareas</h4>
                </div>
                <div class=" py-1">
                    <div class="col-12 m-1">
                        <div class="row">
                            <div class="col-12 col-sm-6 px-2 px-sm-4 text-center">
                                <label class=" text-black-50 mb-2">NOMBRE TAREA</label>
                                <input type="text" name="nombre_tarea" required class="border-0 text-center form-control form-control-sm rounded-pill" maxlength="30">
                            </div>
                            <div class="col-12 col-sm-6 text-center px-2 px-sm-4">
                                <label class=" text-black-50 mb-2">FECHA LIMITE</label>
                                <input type="date" name="fecha_limite" required class="border-0 text-center form-control form-control-sm text-black-50 rounded-pill ">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-sm-2">
                        <div class="row mt-2">
                            <div class="col-12 col-sm-4 col-md-4 mb-2 mb-sm-1">
                                <input type="number" required name="n_horas" class="text-center form-control border-0 form-control-sm rounded-pill mx-2" placeholder="Número de horas">
                            </div>
                            <div class="col-12 col-sm-4 col-md-4 mb-2 mb-sm-1">
                                <select name="grados" required class="text-center form-control form-control-sm border-0 rounded-pill mx-2">
                                    <option value="0" disabled selected>Grado</option>
                                    <option value="11">11</option>
                                    <option value="10">10</option>
                                    <option value="9">9</option>
                                    <option value="todos">todos</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-4 col-md-4 mb-2 mb-sm-1">
                                <input type="number" required name="N_postulaciones" class="text-center form-control border-0 form-control-sm rounded-pill mx-2" placeholder="N° de postulaciones">
                            </div>
                        </div>
                    </div>
                    <!-- Objetivo y descripción -->
                    <div class="col-12 col-sm-12">
                        <div class="row d-flex justify-content-around align-items-lg-stretch">
                            <div class="mb-3 text-center col-12 col-sm-5">
                                <label for="exampleInputEmail1" class="d-block form-label text-black-50">OBJETIVO</label>
                                <textarea name="objetivo" required class=" form-control" cols="30" style="resize: none;" rows="4"></textarea>
                            </div>
                            <div class="mb-3 text-center col-12 col-sm-5 offset-sm-1">
                                <label for="exampleInputEmail1" class="d-block form-label text-black-50">DESCRIPCIÓN</label>
                                <textarea name="descripcion" required class=" form-control" cols="30" rows="4" style="resize: none;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="reset" class=" mx-1 btn btn-warning btn-sm">Limpiar</button>
                        <button type="button" class="mx-1 btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalId">
                            <b class="text-light">Publicar</b>
                        </button>
                        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                                <div class="modal-content border border-3 border-success">
                                    <div class="modal-header bg-success">
                                        <h5 class="modal-title">Deseas publicar la tarea</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center border-0">
                                        <p><b>La tarea será visible a los estudiantes y directivos.</b></p>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" name="Crear_tarea" class="btn btn-outline-success btn-sm">Publicar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous ">
        </script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <?php if (isset($_SESSION['mensajeDeCrearDir'])) { ?>

            <script>
                swal("<?php print $_SESSION['tituloDeCrearDir']; ?>", " <?php print $_SESSION['mensajeDeCrearDir']; ?> "
                    <?php if (isset($_SESSION['tipoCrearDir'])) { ?>, "<?php print $_SESSION['tipoCrearDir']; ?>"
                    <?php } ?>
                );
            </script>
        <?php unset($_SESSION['mensajeDeCrearDir'], $_SESSION['tituloDeCrearDir'], $_SESSION['tipoCrearDir']);
        } ?>
    </body>

    </html>

<?php
} else {
    
    $_SESSION['mensajeDeAlerta'] = "Por favor inicia sesión nuevamente.";
    $_SESSION['tituloDeAlerte'] = "warning";
    $_SESSION['tipoAlerta'] = "Reingreso fallido";
    
    header("Location:../../../index.php");
} ?>