<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../../../../Public/assets/img/tickets.png">
    <link rel="icon" type="image/png" href="../../../../../Public/assets/img/tickets.png">
    <title>
        Gestión de tickets
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../../../../../Public/assets/css/corporate-ui-dashboard.css?v=1.0.0" rel="stylesheet" />
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Iconify -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js" integrity="sha512-lYMiwcB608+RcqJmP93CMe7b4i9G9QK1RbixsNu4PzMRJMsqr/bUrkXUuFzCNsRUo3IXNUr5hz98lINURv5CNA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 bg-slate-900 fixed-start " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand d-flex align-items-center ms-5" href="#" target="_blank">
                <img src="../../../../../Public/assets/img/tickets.png" alt="">
            </a>
        </div>
        <div class="collapse navbar-collapse px-4  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link  active" href="../../Home/index">
                        <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                            <iconify-icon icon="material-symbols:home" width="20" height="20" style="color: white">
                            </iconify-icon>
                        </div>
                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="../../UserHistory/index">
                        <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                            <iconify-icon icon="gis:globe-users" width="20" height="20" style="color: white"></iconify-icon>
                        </div>
                        <span class="nav-link-text ms-1">Historia Usuarios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../Ticket/index">
                        <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                            <iconify-icon icon="streamline:tickets" width="20" height="20" style="color: white">
                            </iconify-icon>
                        </div>
                        <span class="nav-link-text ms-1">Tickets</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-2">
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        </li>
                        <li class="nav-item ps-2 d-flex align-items-center">
                            <a class="btn btn-primary btn-sm">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid py-4 px-5">
            <div class="card border shadow-xs mb-4">
                <div class="card-header border-bottom pb-0">
                    <div class="d-sm-flex align-items-center">
                        <div>
                            <h6 class="font-weight-semibold text-lg mb-0" id="user_history">
                            </h6>
                        </div>
                        <div class="ms-auto d-flex">
                            <a type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2" href="../../UserHistory/index">
                                <span class="btn-inner--text">Ver registros</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row p-4">
                    <form>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="" class="form-label">Empresa</label>
                                <input type="text" class="form-control" name="company" id="company" disabled>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Proyecto</label>
                                <input type="text" class="form-control" name="project" id="project" disabled>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="" class="form-label">Descripción</label>
                                <input type="text" class="form-control" name="description" id="description" disabled>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Usuario Registro</label>
                                <input type="text" class="form-control" name="user" id="user" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-xs text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        </div>
    </main>
    <?php require_once(__DIR__ . '/scripts/show.php'); ?>
    <!--   Core JS Files   -->
    <script src="../../../../../Public/assets/js/plugins/swiper-bundle.min.js" type="text/javascript"></script>
    <script src="../../../../../Public/assets/js/core/popper.min.js"></script>
    <script src="../../../../../Public/assets/js/core/bootstrap.min.js"></script>
    <script src="../../../../../Public/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../../../../Public/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../../../../../Public/assets/js/plugins/chartjs.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../../../../Public/assets/js/corporate-ui-dashboard.min.js?v=1.0.0"></script>
</body>

</html>