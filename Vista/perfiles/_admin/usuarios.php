<?php
require "../../../Controlador/RecogerDatos/_admin/datos.php";

if (isset($_SESSION['id_adm'])) {
    $ida = $_SESSION['id_adm'];


    function RealizarBusqueda($dato, $rol)
    {
        global $conn;
        $rolN = strtoupper($rol);
        switch ($rolN) {
            case 'ESTUDIANTE':
                $table = "ESTUDIANTES";
                break;
            case 'DIRECTIVO':
                $table = "DIRECTIVOS";
                break;
            case 'ADMIN':
                $table = "ADMINS";
                break;
        }
        $sql_4 = "SELECT * FROM $table WHERE (IDENTIDAD like LOWER('$dato%')) OR (NOMBRES like LOWER('$dato%')) OR (APELLIDOS like LOWER('$dato%'));";
        $consult_4 = mysqli_query($conn, $sql_4);
        return $consult_4;
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="../../includes/recursos/faviivon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../../../Vista/custome_bootstrap/style.css">
        <title>Usuarios de plataforma</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
                            <a class=" text-light nav-link active d-sm-inline  d-md-inline  text-opacity-75" title="Perfil" href="tareas_globales.php"><i class="fa-solid fa-book" title="Tareas Globales"></i></a>
                        </li>
                        <li class="nav-item text-start mx-2 h2">
                            <a class=" text-light nav-link active d-sm-inline  d-md-inline  text-opacity-75" title="Perfil" href="info_general.php"><i class="fa-solid fa-info-circle" title="Información general"></i></a>
                        </li>
                        <li class="nav-item text-start mx-2 h2">
                            <a class=" text-light nav-link active d-sm-inline  d-md-inline  text-black-50" title="Perfil" href="usuarios.php"><i class="fa-solid fa-users" title="Usuarios"></i></a>
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
            <!-- Barra de busqueda -->
            <form action="" method="GET">
                <div class="mb-2 col-12 col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-6 offset-lg-3" id="Barra_busqueda">
                    <div class="input-group mb-3 px-2 px-sm-0">
                        <div class="input-group-text border border-0">
                            <!-- <span class="input-group-text form-control border-0 border">Filtrar <i class="ms-1 fa-solid fa-chevron-down"></i></span> -->
                            <span class="input-group-text form-control border-0 border"><i class="fa-solid fa-filter"></i></span>
                            <!-- <span class="input-group-text form-control border-0 border">Filtrar</span> -->
                            <select class="input-group-text mx-2 pe-5 px-2 text-center border border-0" name="rol">
                                <option value="estudiante"><b>Estudiante</b></option>
                                <option value="directivo"><b>Directivo</b></option>
                                <option value="admin"><b>Admin</b></option>
                            </select>
                        </div>
                        <input type="search" maxlength="20" required name="datos" class="form-control input-group-text text-center border-0" placeholder="Busqueda">
                        <button class="input border-0" name="buscar_datos"><i class="fa-solid fa-magnifying-glass">
                                <div class="fs-6 d-inline">buscar</div>
                            </i></button>
                    </div>
                </div>
            </form>
            <div class="">
                <?php
                if (isset($_GET['datos'])) {

                    $datos = $_GET['datos'];
                    $rol = $_GET['rol'];

                    $resultadoBusqueda = RealizarBusqueda($datos, $rol);
                ?>
                    <div class=" alert alert-primary alert-dismissible fade show  align-items-center" role="alert">
                        <i class="btn btn-close" data-bs-dismiss="alert" aria-hidden="true"></i>
                        <div class="table-responsive-sm">
                            <table class="table table-primary">
                                <thead>
                                    <tr>
                                        <th scope="col">IDENTIDAD</th>
                                        <th scope="col">NOMBRES</th>
                                        <th scope="col">ACCIONES </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    while ($Resultado = mysqli_fetch_array($resultadoBusqueda)) {
                                        $idModal = $Resultado['IDENTIDAD'];
                                    ?>
                                        <tr class="">
                                            <td scope="row"><?php echo $Resultado['IDENTIDAD']; ?></td>
                                            <td><?php echo $Resultado['NOMBRES'] . $Resultado['APELLIDOS']; ?></td>
                                            <td>
                                                <div class="col mt-0 p-0 d-flex justify-content-between align-items-start">
                                                    <div class="small">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#<?php echo "ver" . $idModal; ?>" class="btn rounded-3 btn-outline-primary border-0"><i class="fa-solid fa-eye small"></i></button>
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#<?php echo "editar" . $idModal; ?>" class="btn rounded-3 btn-outline-success border-0"><i class="fa-solid fa-pencil small"></i></button>
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#<?php echo "editPass" . $idModal; ?>" class="btn rounded-3 btn-outline-dark border-0"><i class="fa-solid fa-lock small"></i></button>
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#<?php echo "elim" . $idModal; ?>" class="btn rounded-3 btn-outline-danger border-0"><i class=" fa-solid fa-trash-can small"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal verTodo-->
                                        <div class="modal fade" id="<?php echo "ver" . $idModal; ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">Ver información personal</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            Add rows here
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                                                        <button type="button" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal editar-->
                                        <div class="modal fade" id="<?php echo "editar" . $idModal; ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">Editar información personal</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            Add rows here
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                                                        <button type="button" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal cambiar password-->
                                        <div class="modal fade" id="<?php echo "editPass" . $idModal; ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">Restablecer contraseña</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            Add rows here
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                                                        <button type="button" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal eliminar perfil-->
                                        <div class="modal fade" id="<?php echo "elim" . $idModal; ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">Eliminar usuario</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            Add rows here
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                                                        <button type="button" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
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

    $_SESSION['mensajeDeAlerta'] = "Por favor inicia sesión nuevamente.";
    $_SESSION['tituloDeAlerte'] = "Reingreso fallido";
    $_SESSION['tipoAlerta'] = "warning";

    header("Location:../../../index.php");
} ?>