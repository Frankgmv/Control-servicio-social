<!-- Ready, más que listo -->
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../includes/recursos/faviivon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../Vista/custome_bootstrap/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Supermercado+One&display=swap" rel="stylesheet">
    <title>Error ::</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/aba0542b3c.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Header -->
    <nav class="container-fluid navbar navbar-expand-lg navbar-dark bg-primary mb-5">
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
    <!-- cuerpo de esta página -->
    <main class="container  mt-5">
        <section class="row">
            <div class="col-12 col-sm 6 offset-sm-3 col-md-6 offset-md-3 col-lg-6 offset-3 col-xl-3 col-xl-6 justify-content-center">
                <div class="bg-secondary border-2 border-warning px-4 pt-4 pb-3 text-center ">
                    <h2 class="bg-dark text-warning d-inline rounded-3   px-4 py-1 mt-5"><i class="fa-solid fa-circle-exclamation"> Error.</i></h2>
                    <p class="text-start mt-5">Hubo un <b>error</b>, por favor contáctenos por nuestro medios de comunicación para solucionar el problema <wbr>
                        o intente un nuevamente.<br> <i>Gracias por su atención.</i>
                    </p>
                    <div class="row pt-3">
                        <div class="col text-center">
                            <a href="../index.php" class="btn btn-outline-success     border-1 border-success rounded-pill btn-sm ">Volver al inicio.</a>
                        </div>
                        <div class="col text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class=" btn-info btn-sm rounded-circle " data-bs-toggle="modal" data-bs-target="#modalContacto">
                                <i class="fa-regular fa-address-book small"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal " id="modalContacto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title"><i class="fa-regular fa-address-book big"></i>  Medio de contacto.</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="h6">Si deseas contactarnos para agilizar el proceso de corrección del error nos lo puedes hacer saber por 
                                                los diferentes medios de comunicación que tenemos disponible para ti. </p>
                                            <ul class="list-unstyled text-start ps-5">
                                                <!-- TODO colocar los link en la lista para finalizar -->
                                                <li><i class="fa-brands fa-instagram "></i> Instagram</li>
                                                <li><i class="fa-brands fa-facebook"> </i> Facebook</li>
                                                <li><i class="fa-brands fa-whatsapp"> </i> Whatsapp</li>
                                            </ul>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a type="button" href="#" class="btn btn-primary">correo</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
</body>

</html>

<!-- #cSpell:desable; -->