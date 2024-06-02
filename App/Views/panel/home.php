<?php
require_once(__DIR__ . '/layouts/header.php');
require_once(__DIR__ . '/layouts/sidebar.php');
?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php require_once(__DIR__ . '/layouts/navbar.php'); ?>
    <!-- End Navbar -->
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-md-flex align-items-center mb-3 mx-2">
                    <div class="mb-md-0 mb-3">
                        <h3 class="font-weight-bold mb-0">Hola, Noah</h3>
                        <p class="mb-0">Módulos que te pueden interesar</p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-0">
        <div class="row">
            <div class="position-relative overflow-hidden">
                <div class="swiper mySwiper mt-4 mb-2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div>
                                <div class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                                    <div class="full-background bg-cover" style="background-image: url('../assets/img/company.jpg')">
                                    </div>
                                    <div class="card-body text-start px-3 py-0 w-100">
                                        <div class="row mt-12">
                                            <div class="col-sm-6 mt-auto">
                                                <h4 class="text-dark font-weight-bolder">#1</h4>
                                                <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Módulo
                                                </p>
                                                <h5 class="text-dark font-weight-bolder">Historia de Usuarios</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                                <div class="full-background bg-cover" style="background-image: url('../assets/img/tickets.jpg')">
                                </div>
                                <div class="card-body text-start px-3 py-0 w-100">
                                    <div class="row mt-12">
                                        <div class="col-sm-3 mt-auto">
                                            <h4 class="text-dark font-weight-bolder">#2</h4>
                                            <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Módulo</p>
                                            <h5 class="text-dark font-weight-bolder">Tickets</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-3 col-sm-6 mb-xl-0">
                <div class="card border shadow-xs mb-4">
                    <div class="card-body text-start p-3 w-100">
                        <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                            <iconify-icon icon="clarity:building-solid" width="20" height="20" style="color: white"></iconify-icon>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="w-100">
                                    <p class="text-sm text-secondary mb-1">Total de Empresas registradas</p>
                                    <h4 class="mb-2 font-weight-bold" id="companies_count"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0">
                <div class="card border shadow-xs mb-4">
                    <div class="card-body text-start p-3 w-100">
                        <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                            <iconify-icon icon="ic:baseline-folder" width="20" height="20" style="color: white"></iconify-icon>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="w-100">
                                    <p class="text-sm text-secondary mb-1">Total de Proyectos registrados</p>
                                    <h4 class="mb-2 font-weight-bold" id="projects_count"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0">
                <div class="card border shadow-xs mb-4">
                    <div class="card-body text-start p-3 w-100">
                        <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                            <iconify-icon icon="fa-solid:users" width="20" height="20" style="color: white"></iconify-icon>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="w-100">
                                    <p class="text-sm text-secondary mb-1">Total de Usuarios registrados</p>
                                    <h4 class="mb-2 font-weight-bold" id="users_count"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card border shadow-xs mb-4">
                    <div class="card-body text-start p-3 w-100">
                        <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                            <iconify-icon icon="dashicons:tickets-alt" width="20" height="20" style="color: white"></iconify-icon>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="w-100">
                                    <p class="text-sm text-secondary mb-1">Total de Tickets registrados </p>
                                    <h4 class="mb-2 font-weight-bold" id="tickets_count"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once(__DIR__ . '/scripts/count.php');
        require_once(__DIR__ . '/layouts/footer.php');
        ?>