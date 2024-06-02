<?php
require_once(__DIR__ . '/../../layouts/header.php');
require_once(__DIR__ . '/../../layouts/sidebar.php');
?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php
    require_once(__DIR__ . '/../../layouts/navbar.php');
    ?>
    <div class="container-fluid py-4 px-5">
        <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
                <div class="d-sm-flex align-items-center">
                    <div>
                        <h6 class="font-weight-semibold text-lg mb-0">Creación de Ticket</h6>
                        <p class="text-sm">A continuación visualizara información sobre las historias de usuario a la que desea asociar el ticket.</p>
                    </div>
                    <div class="ms-auto d-flex">
                        <a type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2" href="../Ticket/index">
                            <span class="btn-inner--text">Ver registros</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row p-4">
                <form>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="">Historia de Usuario <span class="text-danger">*</span></label>
                            <select name="history" id="history" class="form-control">
                                <option value="" selected disabled>Seleccione una opción...</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Usuario registro</label>
                            <input type="text" class="form-control" id="user" name="user" disabled>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="" class="form-label">Empresa</label>
                            <input type="text" class="form-control" id="company" name="company" disabled>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Proyecto</label>
                            <input type="text" class="form-control" id="project" name="project" disabled>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="" class="form-label">Estado Ticket <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-control">
                                <option value="" selected disabled>Seleccione una opción...</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Comentarios Ticket <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="comments" name="comments">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button type="button" class="btn btn-dark" id="btnCreate">REGISTRAR</button>
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