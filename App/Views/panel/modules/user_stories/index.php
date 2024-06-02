<?php
require_once(__DIR__ . '/../../layouts/header.php');
require_once(__DIR__ . '/../../layouts/sidebar.php');
?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php
    require_once(__DIR__ . '/../../layouts/navbar.php');
    ?>
    <div class="container-fluid py-4 px-5">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Historia de usuarios</h6>
                                <p class="text-sm">Vea información sobre todas las historias de usuarios.</p>
                            </div>
                            <div class="ms-auto d-flex">

                                <a type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2" href="../UserHistory/create">
                                    <iconify-icon icon="mingcute:user-add-2-fill" width="20" height="20" style="color: white"></iconify-icon>
                                    <span class="btn-inner--text">Crear Historia</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 py-0">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7">Usuario</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Projecto</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Empresa</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody id="listUserStories">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once(__DIR__ . '/scripts/list.php');
        require_once(__DIR__ . '/../../layouts/footer.php');
        ?>