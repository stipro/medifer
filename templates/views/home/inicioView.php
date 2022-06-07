<?php require_once INCLUDES.'inc_header.php'; ?>
<?php require_once INCLUDES.'inc_navbar.php'; ?>
<div class="container py-3">
    <h3>Dashboard</h3>
    <hr>
    <div class="col-12">
        <div class="row gx-3 row-cols-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="w-100 d-flex align-items-center">
                            <div class="col-auto pe-1">
                                <span class="fa fa-th-list fs-3 text-primary"></span>
                            </div>
                            <div class="col-auto flex-grow-1">
                                <h5 class="card-title d-none d-sm-block">Categorias</h5>
                                <p class="card-text fs-6 text-end fw-bold">9</p>
                                <p class="card-text d-none d-sm-block h6"><small class="text-muted">Última actualización hace 3 minutos</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="w-100 d-flex align-items-center">
                            <div class="col-auto pe-1">
                                <span class="fa-solid fa-truck-ramp-box fs-3 text-dark"></span>
                            </div>
                            <div class="col-auto flex-grow-1">
                                <h5 class="card-title d-none d-sm-block">Proveedores</h5>
                                <p class="card-text fs-6 text-end fw-bold">3</p>
                                <p class="card-text  d-none d-sm-blockd-none d-sm-block"><small class="text-muted">Última actualización hace 3 minutos</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="w-100 d-flex align-items-center">
                            <div class="col-auto pe-1">
                                <span class="fa-solid fa-pills fs-3 text-warning"></span>
                            </div>
                            <div class="col-auto flex-grow-1">
                                <h5 class="card-title d-none d-sm-block">Productos</h5>
                                <p class="card-text fs-6 text-end fw-bold">4</p>
                                <p class="card-text d-none d-sm-block"><small class="text-muted">Última actualización hace 3 minutos</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="w-100 d-flex align-items-center">
                            <div class="col-auto pe-1">
                                <span class="fa-solid fa-file-pen fs-3 text-info"></span>
                            </div>
                            <div class="col-auto flex-grow-1">
                                <h5 class="card-title d-none d-sm-block">Inventario</h5>
                                <p class="card-text fs-6 text-end fw-bold">660</p>
                                <p class="card-text d-none d-sm-block"><small class="text-muted">Última actualización hace 3 minutos</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h3>Stock Disponible</h3>
                <hr>
                <table class="table table-striped table-hover">

                </table>
            </div>
        </div>
    </div>
    
</div>
<?php require_once INCLUDES.'inc_footer.php'; ?>
