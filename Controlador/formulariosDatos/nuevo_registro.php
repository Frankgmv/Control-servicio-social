<?php
session_start();
?>

<!-- Aquí aparecen los formularios que se encargan de registrar los usuarios según el rol que escogieron -->
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../includes/recursos/faviivon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../Vista/custome_bootstrap/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Supermercado+One&display=swap" rel="stylesheet">
    <title>Registro</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap popper js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/aba0542b3c.js" crossorigin="anonymous"></script>
    <!-- JQUERY PARA OCULTAR Y MOSTRAR LAS CONTRASEÑAS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/aba0542b3c.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Header -->
    <nav class="container-fluid navbar navbar-expand-lg navbar-dark bg-primary ">
        <a class="navbar-brand" href="../../index.php">
            <div class="row">

                <div class="col-auto text-start d-inline">
                    <img src="../includes/recursos/img-cabecera.png" class="i" width="auto" height="80" alt="logo sistema">
                </div>
                <h4 class="col-auto d-flex  align-items-center justify-content-start p-0 m-0 text-capitalize">
                    <strong class="d-block"><em> control de servicio social.</em></strong>
                </h4>
            </div>
        </a>
    </nav>

    <!-- Cuerpo de esta página -->
    <main class="card-group">
        <div class="card">
            <!-- animaciones del grado 11° 2022 IERML. -->
            <!-- <img class="card-img img-fluid" src="../includes//NuevasImagenes/animacion.gif" alt=""> -->
            <!-- <img class="card-img img-fluid" src="../includes/NuevasImagenes/img-autor.jpg" alt=""> -->
            <div class="card-img-overlay">
                <div class="d-flex justify-content-center align-items-center">

                    <!-- Formulario de registro para estudiante -->
                    <form class="shadow shadow-lg  bg-body  rounded mt-5 border border-5 border-primary rounded-5 <?php echo $_SESSION['estudiante']; ?> " action="datos_formularios_registro.php" method="POST">
                        <div class="text-center text-light bg-primary">
                            <h3 class="border-0 py-2">Nuevos estudiantes.</h3>
                        </div>
                        <div class="form-group px-3 pt-2 mb-1">
                            <div class="text-center rounded-3 pt-2 ">
                                <div class="row my-3">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <input type="text" required autofocus name="nombres" placeholder=" Nombres" class="text-center  rounded-pill form-control mb-1 border ">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <input type="text" required autofocus name="apellidos" placeholder=" Apellidos" class="text-center rounded-pill form-control mb-1 border ">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 ">
                                        <input type="text" required autofocus name="identidad" placeholder="Identidad" class="text-center rounded-pill form-control mb-1">
                                    </div>
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        <input type="number" required autofocus name="edad" placeholder=" Edad" class="text-center rounded-pill form-control mb-1 border ">
                                    </div>
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        <input type="number" required autofocus name="celular" placeholder=" Celular" class="text-center rounded-pill form-control mb-1 border ">
                                    </div>
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        <!-- <input type="number" required autofocus name="celular" placeholder=" Celular" class="text-center rounded-pill form-control mb-1 border "> -->
                                        <select name="grado"   autofocus class="rounded-pill text-muted form-select  text-center">
                                            <option required aria-required="true" value="" selected disabled>Grado</option>
                                            <option value="9">9°</option>
                                            <option value="10">10°</option>
                                            <option value="11">11°</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <!-- Media técnica -->
                                        <div class="input-group rounded-pill mb-2">
                                            <span class="input-group-text bg-body border-end-0 text-muted">SENA<i class="fa-solid fa-right-long ms-3"></i></span>
                                            <select name="nombre_tecnica" autofocus  id="nom_tecnica" class="text-center form-select  text-muted border-start-0 text-start text-uppercase" required>
                                                <option required aria-required="true" value="Seleccionar" disabled selected>Seleccionar</option>
                                                <option value="Desarrollo de software">Desarrollo de Software</option>
                                                <option value="Asesoria comercial">Asesoría Comercial</option>
                                                <option value="Ninguna">Ninguna</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <input type="hidden" readonly value="<?php echo date('Y-m-d'); ?>" autofocus id="fecha" name="fecha_actual" class="text-center text-muted bg-body rounded-pill form-control mb-1 border ">
                                        <input type="email" required autofocus name="correo" placeholder="Correo" class="bg-body rounded-pill form-control text-center">
                                    </div>
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 ">

                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
                                        <!-- Rol-->
                                        <input type="hidden" readonly name="rol" title="Rol en plataforma" value="<?php echo $_SESSION['rol']; ?>" class="text-muted  text-center rounded-pill text-capitalize form-control border bg-light ">
                                    </div>
                                    <div class="col-10 offset-1">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="input-group">
                                        <input type="password" id="muestrate" class="bg-body input-group-text text-center rounded-pill mt-2 ms-2 mb-1 ps-3 border text-start rounded form-control" required autofocus name="contra" placeholder="Contraseña" title="contraseña">
                                        <input type="password" id="clavess" class="bg-body input-group-text rounded-pill mt-2 ms-2 mb-1 ps-3 border text-start rounded form-control text-center" required autofocus name="claveEspecial3" placeholder="Clave admin" title="Sin no la conoce solicítela al super administrador">
                                        <button onclick="Muestrate()" id="muestrate" name="ver" type="button" class="btn btn-outline-body btn-sm border-0 rounded rounded-circle img-thumbnail input-group-text"><i class="fa-solid fa-eye"></i></button>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-evenly align-items-center">
                                    <div class="">
                                        <div class="form-check form-switch">
                                            <input required autofocus type="checkbox" name="tyc" id="tyc" value="acepto" checked class="form-check form-switch st ms-2 form-check-input ">
                                            <label for="tyc" class="ms-1 mt-1 form-check-label">Acepta T & C</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary m-1 mt-4 border border-1 border-primary rounded-pill " name="Crear_estudiantes"><i class="fa-solid fa-user-plus"><b> Registrar.</b></i></button>
                                </div>
                            </div>
                            <p class="text-center mt-3"><a href="../../index.php" class=" text-muted btn border-0 btn-outline-secondary btn-sm rounded rounded-pill"><i class="fa-solid fa-user-large"> <i> Ya tengo cuenta</i></i></a></p>
                        </div>
                    </form>
                    <!-- formulario de registro para directivo -->
                    <form class="shadow-lg rounded mb-5 border border-4 border-primary bg-body <?php echo $_SESSION['directivo']; ?>" action="datos_formularios_registro.php" method="POST">
                        <div class="text-center text-light bg-primary">
                            <h3 class="border-0 py-2">Nuevos Directivos.</h3>
                        </div>
                        <div class="form-group px-1 px-sm-4 ">
                            <div class="text-center">

                                <div class="row my-3">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <input type="text" required autofocus name="nombres" placeholder=" Nombres" class="text-center rounded-pill form-control form-control-sm mb-1 border ">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <input type="text" required autofocus name="apellidos" placeholder=" Apellidos" class="text-center rounded-pill form-control form-control-sm mb-1 border ">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                                        <input type="text" required autofocus name="identidad" placeholder=" Identidad" class=" text-center rounded-pill form-control-sm form-control">
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <input type="number" required autofocus name="edad" placeholder=" Edad" class="rounded-pill form-control form-control-sm text-center">
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <input type="number" required autofocus name="celular" placeholder=" Celular" class="rounded-pill form-control-sm form-control text-center">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <!-- Fecha Actual -->
                                    <input type="hidden" required autofocus id="fecha" name="fecha_actual" value="<?php echo date("Y-m-d"); ?>">
                                    <!-- Rol -->
                                    <input type="hidden" readonly name="rol" value="<?php echo $_SESSION['rol']; ?>">

                                    <div class="col-12 px-4">
                                        <input type="email" required autofocus name="correo" placeholder=" Correo" class="text-center rounded-pill form-control form-control-sm mb-1 border ">
                                    </div>
                                </div>
                                <div class="row mb-2">

                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <!-- <label for="" class="ms-3 text-muted small">Labor</label> -->
                                        <input type="text" required autofocus name="ocupacion" placeholder="Profesión" class=" text-center rounded-pill form-control form-control-sm ">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <select name="donde_labora" required autofocus class="text-center text-muted form-select form-select-sm rounded-pill">
                                            <option value="0" selected disabled>¿En qué parte labora?</option>
                                            <option value="P. educativa">Parte educativa</option>
                                            <option value="P. recreativa">Parte recreativa</option>
                                            <option value="P. deportiva">Parte deportiva</option>
                                            <option value="P. administrativa">Parte administrativa</option>
                                            <option value="Otras partes">Otras.</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group small">
                                    <input type="password" id="muestrate2" required autofocus name="contra" placeholder="Contraseña" pattern="[A-Za-z0-9@#$%]{8-20}" title="" class="text-center rounded-pill mt-2 ms-2 bg-body mb-1 ps-3 border text-start rounded form-control form-control-sm input-group-text">
                                    <input type="password" id="ClaveEspecial2" required autofocus name="claveEspecial2" placeholder="Inserte la clave especial" title="Sin no la conoce solicítela al super administrador" class="bg-body rounded-pill mt-2 ms-2 mb-1 ps-3 border form-control-sm text-start rounded text-center form-control input-group-text">
                                    <button onclick="Muestrate()" id="muestrate2" name="ver" type="button" class="btn btn-outline-body btn-sm border-0 rounded rounded-circle  input-group-text"><i class="fa-solid fa-eye"></i></button>
                                </div>
                            </div>
                            <div class="d-flex justify-content-evenly align-items-center">
                                <div class="">
                                    <div class="form-check form-switch mt-sm-3">
                                        <input required autofocus type="checkbox" name="tyc" id="tyc" value="acepto" checked class="form-check form-switch ms-2 form-check-input ">
                                        <label for="tyc" class="ms-1 mt-1 form-check-label">Acepta T & C</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary m-1 mt-4 border border-1 border-primary rounded-pill " name="Crear_directivos"><i class="fa-solid fa-user-plus"><b> Registrar.</b></i></button>
                            </div>
                            <p class="text-center mt-3"><a href="../../index.php" class=" text-muted btn border-0 btn-outline-secondary btn-sm rounded rounded-pill"><i class="fa-solid fa-user-large"> <i> Ya tengo cuenta</i></i></a></p>
                        </div>
                    </form>
                    
                    <!--  formulario de administradores -->
                    <form class="shadow-lg rounded mb-5 border border-4 border-primary bg-body  <?php echo $_SESSION['administrador']; ?>" action="datos_formularios_registro.php" method="POST">
                        <div class="text-center text-light bg-primary">
                            <h3 class="border-0 py-2">Nuevos Administradores.</h3>
                        </div>
                        <div class="form-group px-1 px-sm-4 ">
                            <div class="text-center">

                                <div class="row my-3">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <input required type="text" autofocus name="nombres" placeholder=" Nombres" class="text-center rounded-pill form-control form-control-sm mb-1 border ">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <input required type="text" autofocus name="apellidos" placeholder=" Apellidos" class="text-center rounded-pill form-control form-control-sm mb-1 border ">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                                        <input required type="text" autofocus name="identidad" placeholder=" Identidad" class=" text-center rounded-pill form-control-sm form-control">
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <input required type="number" autofocus name="edad" placeholder=" Edad" class="rounded-pill form-control form-control-sm text-center">
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <input required type="number" autofocus name="celular" placeholder=" Celular" class="rounded-pill form-control-sm form-control text-center">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <!-- Fecha Actual -->
                                    <input type="hidden" autofocus id="fecha" name="fecha_actual" value="<?php echo date("Y-m-d"); ?>">
                                    <!-- Rol -->
                                    <input type="hidden" readonly name="rol" value="<?php echo $_SESSION['rol']; ?>">

                                    <div class="col-12 px-4">
                                        <input required type="email" autofocus name="correo" placeholder=" Correo" class="text-center rounded-pill form-control form-control-sm mb-1 border ">
                                    </div>
                                </div>
                                <div class="row mb-2">

                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <!-- Labor -->
                                        <input required type="text" autofocus name="ocupacion" placeholder="Profesión" class=" text-center rounded-pill form-control form-control-sm ">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <select required name="donde_labora" autofocus class="text-center text-muted form-select form-select-sm rounded-pill">
                                            <option value="0" selected disabled>¿En qué parte labora?</option>
                                            <option value="P. educativa">Parte educativa</option>
                                            <option value="P. recreativa">Parte recreativa</option>
                                            <option value="P. deportiva">Parte deportiva</option>
                                            <option value="P. administrativa">Parte administrativa</option>
                                            <option value="Otras partes">Otras.</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group small">
                                    <input required type="password" id="muestrate3" autofocus name="contra" placeholder="Contraseña" pattern="[A-Za-z0-9@#$%]{8-20}" title="" class="text-center rounded-pill mt-2 ms-2 bg-body mb-1 ps-3 border text-start rounded form-control form-control-sm input-group-text">
                                    <input required type="password" id="ClaveEspecial" autofocus name="ClaveEspecial" placeholder="Inserte la clave especial" title="Sin no la conoce solicítela al super administrador" class="bg-body rounded-pill mt-2 ms-2 mb-1 ps-3 border form-control-sm text-start rounded text-center form-control input-group-text">
                                    <button onclick="Muestrate()" id="muestrate3" name="ver" type="button" class="btn btn-outline-body btn-sm border-0 rounded rounded-circle  input-group-text"><i class="fa-solid fa-eye"></i></button>
                                </div>
                            </div>
                            <div class="d-flex justify-content-evenly align-items-center">
                                <div class="">
                                    <div class="form-check form-switch mt-sm-3">
                                        <input required type="checkbox" name="tyc" id="tyc" value="acepto" checked class="form-check form-switch ms-2 form-check-input ">
                                        <label for="tyc" class="ms-1 mt-1 form-check-label">Acepta T & C</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary m-1 mt-4 border border-1 border-primary rounded-pill " name="Crear_admins"><i class="fa-solid fa-user-plus"><b> Registrar.</b></i></button>
                            </div>
                            <p class="text-center mt-3"><a href="../../index.php" class=" text-muted btn border-0 btn-outline-secondary btn-sm rounded rounded-pill"><i class="fa-solid fa-user-large"> <i> Ya tengo cuenta</i></i></a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </main>

    <!-- Para las contraseñas, ocultar y ver estas. -->
    <script type="text/javascript">
        function Muestrate() {
            var element = document.getElementById("muestrate");
            var nueva = document.getElementById("clavess");
            var element2 = document.getElementById("muestrate2");
            var element3 = document.getElementById("muestrate3");
            var element4 = document.getElementById("ClaveEspecial");
            var element5 = document.getElementById("ClaveEspecial2");

            if (element.type == 'password') {
                element.type = 'text';
                nueva.type = 'text';
            } else {
                element.type = 'password';
                nueva.type = 'password';
            }

            if (element2.type == 'password') {
                element2.type = 'text';
                element5.type = 'text';
            } else {
                element2.type = 'password';
                element5.type = 'password';
            }

            if (element3.type == 'password') {
                element3.type = 'text';
                element4.type = 'text';
            } else {
                element3.type = 'password';
                element4.type = 'password';
            }

        }
    </script>
</body>

</htm>