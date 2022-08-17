<?php
// include_once "../../Controlador/RecogerDatos/estudiante/datos.php";
session_start();


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

<body>
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
                        <a class="text-light nav-link active d-sm-inline  d-md-inline " title="Perfil" href="perfil_estudiante.php"><i class="fa-solid fa-circle-user" title="Perfil"></i></a>
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
    <main>

    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>