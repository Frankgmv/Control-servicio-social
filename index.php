<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="Controlador/includes/recursos/faviivon.ico" type="image/x-icon">
    <link rel="stylesheet" href="Vista/custome_bootstrap/style.css">
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="">
    <!-- Header -->
    <nav class="container-fluid navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">
            <div class="row">

                <div class="col-auto text-start d-inline">
                    <img src="Controlador/includes/recursos/img-cabecera.png" class="i" width="auto" height="80" alt="logo sistema">
                </div>
                <h4 class="col-auto d-flex  align-items-center justify-content-start p-0 m-0 text-capitalize">
                    <strong class="d-block"><em>control de servicio social.</em></strong>
                </h4>
            </div>
        </a>
    </nav>
    <main class="container">
        <div class="row pt-3 mt-1  mb-5">
            <div class="col-12 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 ">
                <section class="card  shadow-lg border border-4 border-primary">
                    <div class="col text-center bg-primary py-2">
                        <h4 class=""><i class="fa-solid fa-face-smile-wink text-light"><b class="h3"> INICIA AHORA.</b></i></h4>
                    </div>
                    <form class="p-3 mb-2 bg-body mt-5 " action="Controlador/formulariosDatos/datos_inicio.php" method="POST">
                        <div class="form-group text-center">
                            <div class="row mb-2">
                                <div class="col-2">
                                </div>
                                <div class="col-8  input-group px-5 ">
                                    <span class="input-group-text bg-body border-bottom border-top border-start border-end-0 border-2">Roles</span>
                                    <select name="rol" required class="form-select  border-bottom border-top border-start border-start-0 border-2 border-secondary text-center">
                                        <option value="volver" selected>Seleccionar</option>
                                        <option value="estudiante">Estudiante</option>
                                        <option value="directivo">Directivo</option>
                                        <option value="administrador">Administrador</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly mt-4">
                            <button type="submit" class="btn btn-outline-primary m-1 mt-2 btn-sm rounded-pill" name="registro"> <i class="fa-solid fa-user-plus"><b> Registrarme.</b></i></button>
                            <button type="submit" class="btn btn-outline-success m-1 mt-2 btn-sm rounded-pill" name="inicio"><i class="fa-solid fa-user"><b> Iniciar sesión.</b></i></button>
                        </div>

                    </form>
                    <div class="text-center">
                        <!-- Button disparador del modal -->
                        <button class=" border-0 text-muted btn-light btn-sm mb-3 " data-bs-toggle="modal" data-bs-target="#modalContacto">
                            <i class="fa-solid fa-person-chalkboard"><b> Leer más.</b></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade lg   " id="modalContacto" tabindex="-1" role="dialog" aria-labelledby="modalContacto" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-capitalize">instrucciones básicas</h5>
                                        <button type="button" class="close border-0 btn btn-outline-secondary btn-m d-flex align-bottom" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class=" text-center" id="Instrucciones">
                                            <div class="row pt-2">
                                                <div class=" order-2 col-12 text-center m-1 small border border-1 border-secondary rounded-2">
                                                    <h6 class="text-capitalize b text-danger   my-2">Usuarios ya registrado.</h6>
                                                    <ol type="1" class="text-start ">
                                                        <li>Selecciona tu rol</li>
                                                        <li>Haz clic en el botón de <b>Iniciar sesión</b>.</li>
                                                        <li>Ingresa tu <b>documento</b>.</li>
                                                        <li>Ingresa tu contraseña.</li>
                                                        <li>Por ultimo, valida que tus datos sean correctos y dale Iniciar Sesión</li>
                                                    </ol>
                                                </div>
                                                <div class="order-1 col-12 text-center m-1 small border border-1 border-secondary rounded-2">
                                                    <h6 class="text-capitalize b text-danger my-2">usuarios nuevos.</h6>
                                                    <ol type="1" class="text-start ">
                                                        <li>Selecciona el rol que necesitas en la plataforma.</li>
                                                        <li>Haz clic en el botón de <b>Registrarme</b>.</li>
                                                        <li>Ingresa tus datos en el formulario que te aparecerá.</li>
                                                        <li>No olvides ingresar la clave especial para que valide tu registro.</li>
                                                        <li>Clic en el botón de Registrarme.</li>
                                                        <li>Luego de todo inicia sesión con tus datos creados en el registro.</li>
                                                    </ol>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12 small">
                                                    <h6 class="small b"> La plataforma es unicamente para el servicio social de los grados <b> Noveno, Décimo y Once.</b></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
    <!-- footer -->
    <footer class="mt-3">
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php if (isset($_SESSION['mensajeDeAlerta'])) { ?>

        <script>
            swal("<?php print $_SESSION['tituloDeAlerte']; ?>", " <?php print $_SESSION['mensajeDeAlerta']; ?> "
                <?php if (isset($_SESSION['tipoAlerta'])) { ?>, "<?php print $_SESSION['tipoAlerta']; ?>"
                <?php } ?>
            );
        </script>
    <?php unset($_SESSION['mensajeDeAlerta'], $_SESSION['tituloDeAlerte'], $_SESSION['tipoAlerta']);
    } ?>
</body>

</html>