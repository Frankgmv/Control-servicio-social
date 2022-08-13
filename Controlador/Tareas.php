<?php include('includes/header.php'); ?>

<main class="">
    
    <section class="">

        <div class="card-group m-3 ">
            <div class="card border border-primary text-light">
                <!-- <img class="card-img-top" src="includes/NuevasImagenes/flor1.jpg" alt=""> -->
                <div class="card-body bg-primary">
                    <h4 class="card-title my-2 text-uppercase">Jardineros Estudiantiles </h4>
                    <p class="card-text my-2 ">
                        Arreglar el jadin trasero para una acticidad de los grados 2°
                    </p>
                    <div class="card-footer">
                        <div class="row">

                        </div>
                    </div>

                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    Quote
                </div>
                <div class="card-body">
                    <blockquote class="">
                        <p>A well-known quote, contained in a blockquote element.</p>
                        <footer class="blockquote-footer">Someone famous in <cite>Source Title</cite></footer>
                    </blockquote>
                </div>
            </div>
            <div class="card border border-primary text-light">
                <img class="card-img-top" src="includes/NuevasImagenes/flor1.jpg" alt="">
                <div class="card-body bg-primary">
                    <h4 class="card-title my-2 text-uppercase">Jardineros Estudiantiles </h4>
                    <p class="card-text my-2">
                    <p>
                        Arreglar el jadin trasero para una acticidad de los grados 2°
                    </p>
                    <div class="row mt-2">
                        <div class=" shadow-lg col-12 col-sm-6 col-md-6 col-lg-6 ">
                            <div class="text-center">Requisitos</div>
                            <details class="">
                                <Summary class="m-auto p-auto ">Obligatorios</Summary>
                                <ul class="style-unlist">
                                    <li> Ser de 10°</li>
                                    <li> Traer Marcadores</li>
                                    <li> Llegar temprano</li>
                                </ul>
                            </details>
                            <details>
                                <summary>Opcionales</summary>
                                <dl>
                                    <dt>tigeras de jadinero</dt>
                                    <dd>Se daran horas extras Por traer materiales</dd>
                                    <dt>Regader</dt>
                                    <dd>1 por la regadera</dd>
                                </dl>
                            </details>
                        </div>
                        <div class="shadow col-12 col-sm-auto justify-content-sm-evenly ">
                            <button class="btn btn-outline-light btn-sm my-sm-1 text-uppercase d-block">Postularse</button>
                            <button class="btn btn-outline-light btn-sm my-sm-1 text-uppercase d-block">Sugerencia</button>
                        </div>
                    </div>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- <aside class="col-12 col-sm-2 col-md-2 col-lg-4 col-xl-4 col-xxl-4"></aside> -->
</main>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="text-center">
        <!-- TODO IMPLEMENTAR ESTE TIPO DE VENTANA FLOTANTES A EL PROYECTO  -->
        <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#frankpro">Para mas informaciones no presionar</button>

        <div id="frankpro" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        hola soy el titulo
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-primary" role="alert">
                            <p>soy el cuerpo del modal</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="button" data-dismiss="frankpro">cerrar</button>
                        <button class="btn btn-success" type="button" data-dismiss="frankpro">aceptar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="text-center">


<!-- TODO IMPLEMENTAR ESTE TIPO DE VENTANA FLOTANTES A EL PROYECTO  -->
<button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#my-modal">Para mas informaciones no presionar</button>

<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-body">
        <p>frank's developer fullstack</p>
    </div>
    <div class="modal-footer">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Possimus excepturi qui sapiente vitae ipsam minus, enim, dolorum quam saepe deserunt, neque esse eveniet! Nisi inventore labore excepturi officiis unde consequatur.
    </div>
</div>
</div>
</div>

</div>


<?php include('includes/footer.php'); ?>