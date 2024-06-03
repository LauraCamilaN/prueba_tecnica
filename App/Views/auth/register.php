<?php require_once(__DIR__ . '/layouts/header.php'); ?>

<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="position-absolute w-40 top-0 start-0 h-100 d-md-block d-none">
                            <div class="oblique-image position-absolute d-flex fixed-top ms-auto h-100 z-index-0 bg-cover me-n8" style="background-image:url('../assets/img/fondo.jpg')">
                                <div class="my-auto text-start max-width-350 ms-7">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-group d-flex">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-4">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-black text-dark display-6">Registrarse</h3>
                                <p class="mb-0">¡Estamos felices de conocerte! Por favor ingresa tus datos.</p>
                            </div>
                            <div class="card-body">
                                <form role="form" autocomplete="off">
                                    <div class="row mb-4">
                                        <div class="col">
                                            <label for="" class="form-label">Nombres <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="names" name="names">
                                        </div>
                                        <div class="col">
                                            <label for="" class="form-label">Apellidos <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="last_names" name="last_names">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <label for="" class="form-label">Número de contacto <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="phone" name="phone">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <label for="" class="form-label">Departamento <span class="text-danger">*</span></label>
                                            <select name="department" id="department" class="form-control">
                                                <option value="" selected disabled>Seleccione una opción...</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="" class="form-label">Ciudad <span class="text-danger">*</span></label>
                                            <select name="city" id="city" class="form-control">
                                                <option value="" selected disabled>Seleccione una opción...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <label for="" class="form-label">Correo electrónico <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" id="email">
                                        </div>
                                        <div class="col">
                                            <label for="" class="form-label">Contraseña <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password" id="password">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <label for="" class="form-label">Empresa a la que pertenece<span class="text-danger">*</span></label>
                                            <select name="company" id="company" class="form-control">
                                                <option value="" selected disabled>Seleccione una opción...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-center">
                                            <button class="btn btn-dark w-100 mt-4 mb-3" type="button" id="btnCreate">Registrarse</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-xs mx-auto">
                                    ¿Ya tienes una cuenta?
                                    <a href="../Auth/login" class="text-dark font-weight-bold">Iniciar sesión</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
require_once(__DIR__ . '/scripts/list.php');
require_once(__DIR__ . '/scripts/create.php');
require_once(__DIR__ . '/layouts/footer.php');
?>