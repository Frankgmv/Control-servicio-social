<?php

session_start();

?>
<!-- Aquí aparecen los formularios que se encargan de validar los datos de los usuarios según el rol que tiene asignado-->
<!-- TODO Arreglar el formulario con los input-group de Kiko Palomares a este formulario de inicio de sesión -->

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../includes/recursos/faviivon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../Vista/custome_bootstrap/style.css">
    <title>Inicio de sesión</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <nav class="container-fluid navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="../../index.php">
                <div class="row">

                    <div class="col-auto text-start d-inline">
                        <img src="../includes/recursos/img-cabecera.png" class="i" width="auto" height="80" alt="logo del sistema" title="Inicio">
                    </div>
                    <h4 class="col-auto d-flex  align-items-center justify-content-start p-0 m-0 text-capitalize">
                        <strong class="d-block"><em> control de servicio social.</em></strong>
                    </h4>
                </div>
            </a>
        </nav>
    </header>
    <main class="container">
        <div class="row col-md-6 offset-md-3 col-lg-6 offset-lg-3  col-xl-6 offset-xl-3 col-xxl-6 offset-xxl-3">
            <div class="card ">
                <div class="card-img-overlay pt-3">
                    <div class="d-flex justify-content-center align-items-center">
                        <form class=" border border-primary border-4 shadow shadow-md text-center bg-body rounded mb-sm-3" method="POST" action="datos_formularios_inicio.php">
                            <legend class="py-2 bg-primary text-light"> <?php echo "Inicio " . $_SESSION['mensaje']; ?></legend>
                            <div class="row  px-sm-4 px-md-4 px-lg-4 pt-sm-1">
                                <div class="col-12 px-5 my-1">
                                    <!-- rol -->
                                    <input type="hidden" name="rol" class="text-center form-control border-0 rounded-pill mb-4 text-capitalize bg-light" readonly value="<?php echo $_SESSION['rol']; ?>">

                                    <!-- user -->
                                    <div class="form-floating mb-3">
                                        <input required autofocus type="text" name="documento" class="form-control" id="floatingInput" placeholder="Documento">
                                        <label for="floatingInput">Documento</label>
                                    </div>
                                </div>
                                <!-- password -->
                                <div class="col-12 px-5 my-1">
                                    <div class="form-floating mb-3">
                                        <input required autofocus type="password" id="ver" name="password" class="form-control" id="floatingPassword" placeholder="Contraseña">
                                        <label for="floatingPassword">Contraseña</label>
                                    </div>
                                </div>
                                <!-- submit -->
                                <div class="d-flex align-items-evenly justify-content-evenly ">
                                    <button onclick="Cambiar()" type="button" class="btn btn-light btn-sm rounded-circle" title="ver contraseña"><i class="fa-solid fa-eye"></i></button>
                                    <button type="submit" class="btn btn-outline-success btn-sm  text-capitalize rounded-pill" name="<?php echo $_SESSION['nombreDeSession']; ?>"><i class="fa-solid fa-user"><b> Iniciar sesión.</b></i></button>
                                </div>
                            </div>
                            <!-- back to index -->
                            <p class="text-center mt-3"><a href="../../index.php" class=" text-muted btn border-0 btn-outline-light btn-sm rounded rounded-pill"><i class="fa-solid fa-user-plus"><b> No tengo cuenta.</b></i></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function Cambiar() {
            var elemento = document.getElementById('ver');
            if (elemento.type == 'password') {
                elemento.type = 'text';
            } else {
                elemento.type = 'password';
            }
        }
    </script>


    <?php if (isset($_SESSION['mensajeInicio'])) { ?>
        <script>
            swal("<?php print $_SESSION['tituloInicio']; ?>", " <?php print $_SESSION['mensajeInicio']; ?> "
                <?php if (isset($_SESSION['tipoAlertaInicio'])) { ?>, "<?php print $_SESSION['tipoAlertaInicio']; ?>"
                <?php } ?>
            );
        </script>
    <?php unset($_SESSION['mensajeInicio'], $_SESSION['tituloInicio'], $_SESSION['tipoAlertaInicio']);
    } ?>


</body>

</html>