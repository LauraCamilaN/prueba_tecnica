<?php require_once(__DIR__ . '/layouts/header.php'); ?>
<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-black text-dark display-6">Bienvenido(a)</h3>
                                <p class="mb-0">¡Bienvenido de nuevo! Por favor ingrese sus datos.</p>
                            </div>
                            <div class="card-body">
                                <form role="form">
                                    <label>Correo electrónico</label>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="Introduce tu dirección de correo electrónico" aria-label="Email" aria-describedby="email-addon" name="email" id="email">
                                    </div>
                                    <label>Contraseña</label>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="Introduce tu contraseña" aria-label="Password" aria-describedby="password-addon">
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-dark w-100 mt-4 mb-3">Ingresar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-xs mx-auto">
                                    ¿No tienes una cuenta?
                                    <a href="../Auth/Register" class="text-dark font-weight-bold">Requistrate aquí</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-absolute w-40 top-0 end-0 h-100 d-md-block d-none">
                            <div class="oblique-image position-absolute fixed-top ms-auto h-100 z-index-0 bg-cover ms-n8" style="background-image:url('../assets/img/fondo_login.jpg')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php require_once(__DIR__ . '/layouts/footer.php'); ?>