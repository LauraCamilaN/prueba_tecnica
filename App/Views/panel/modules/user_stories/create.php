<?php
require_once(__DIR__ . '/../../layouts/header.php');
require_once(__DIR__ . '/../../layouts/sidebar.php');
?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require_once(__DIR__ . '/../../layouts/navbar.php'); ?>
    <div class="container-fluid py-4 px-5">
        <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
                <div class="d-sm-flex align-items-center">
                    <div>
                        <h6 class="font-weight-semibold text-lg mb-0">Creación de historia</h6>
                        <p class="text-sm">Recuerde, visualizara solamente las empresas que cuenten con proyectos.</p>
                    </div>
                    <div class="ms-auto d-flex">
                        <a type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2" href="../UserHistory/index">
                            <span class="btn-inner--text">Ver registros</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row p-4">
                <form>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="" class="form-label">Empresa <span class="text-danger">*</span></label>
                            <select name="company" id="company" class="form-control">
                                <option value="" selected disabled>Seleccione una opción...</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Proyecto <span class="text-danger">*</span></label>
                            <select name="project" id="project" class="form-control">
                                <option value="" selected disabled>Seleccione una opción...</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="" class="form-label">Descripción <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="description" id="description">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button class="btn btn-dark" id="btnCreate" type="button">REGISTRAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    require_once(__DIR__ . '/scripts/create.php');
    require_once(__DIR__ . '/../../layouts/footer.php');
    ?>