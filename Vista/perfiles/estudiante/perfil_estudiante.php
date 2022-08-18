<?php
// include_once "../../Controlador/RecogerDatos/estudiante/datos.php";
session_start();

// cierre de sesiones
if (isset($_SESSION['id'])) {
    // include "../../../index.php";
    // $_SESSION['mensajeDeAlerta'] = 
    // $_SESSION['tipoAlerta']
    // $_SESSION['tituloDeAlerte']

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
                    <div class="row">

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
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navegacion" class=" justify-content-sm-end collapse navbar-collapse">
                    <ul class="h4 navbar-nav  mt-3 list-group-horizontal justify-content-end">
                        <li class="nav-item text-start mx-2">
                            <a class="text-light nav-link active d-sm-inline  d-md-inline " title="Perfil" href="#"><i class="fa-solid fa-circle-user" title="Perfil"></i></a>
                        </li>
                        <li class="nav-item text-start mx-2">
                            <a class="text-light nav-link active d-sm-inline d-md-inline" href="tareas.php" title="Tareas"><i class="fa-solid fa-book"></i></a></a>
                        </li>
                        <li class="nav-item text-start mx-2">
                            <a class="text-light nav-link active d-sm-inline d-md-inline" href="../Cerrar_sesiones.php" title="Cerrar sesión"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
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
                <div class="bg-warning border-bottom border-3 border-primary text-center py-2">
                    <!-- TODO utilizar una función para cambiar el icono de caras por otras -->
                    <h1 class="text-light "><i class="fa-solid fa-user-astronaut"><b> <?php echo "Frank"; ?></b></i></h1>
                </div>
                <div class="mx-2">
                    <!-- hilera 1 -->
                    <div class="row my-2">
                        <div class="col-12 col-md-4 mb-2">
                            <!-- Nombres -->
                            <div class="input-group">
                                <span class="input-group-text border-0">Nombres </span>
                                <input type="text" value="<?php echo "Frank Giovany"; ?>" class="border-0 form-control rounded-4 text-center" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-2">
                            <!-- Apellidos -->
                            <div class="input-group">
                                <span class="input-group-text">Apellidos </span>
                                <input type="text" value="<?php echo "Muriel Velásquez"; ?>" class="form-control rounded-4 text-center" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-1">
                            <!-- Identidad -->
                            <div class="input-group">
                                <span class="input-group-text">ID </span>
                                <input type="text" value="<?php echo "1011689172"; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-1">
                            <!-- Fecha de registro -->
                            <div class="input-group">
                                <span class="input-group-text">Fecha de registro </span>
                                <input type="text" value="<?php echo "12-21-43"; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-1">
                            <!-- celular -->
                            <div class="input-group">
                                <span class="input-group-text">Celular</span>
                                <input type="text" value="<?php echo "30420403033"; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-1">
                            <!-- horas totales -->
                            <div class="input-group">
                                <span class="input-group-text">Horas</span>
                                <input type="text" value="<?php echo "12"; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-1">
                            <!-- grado -->
                            <div class="input-group">
                                <span class="input-group-text">Grado</span>
                                <input type="text" value="<?php echo "10°"; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-1">
                            <!-- Media técnica -->
                            <div class="input-group">
                                <span class="input-group-text">Media técnica</span>
                                <input type="text" value="<?php echo "Desarrollo de software"; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-1">
                            <!-- Correo -->
                            <div class="input-group">
                                <span class="input-group-text">Correo </span>
                                <input type="text" value="<?php echo "giovanyvelasquez200523@gmail.com"; ?>" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>

<?php  }  ?>