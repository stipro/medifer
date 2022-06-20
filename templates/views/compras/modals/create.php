<!-- Modal -->
<div class="modal fade" id="mdAdd-compras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">[Nuevo] Compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <fieldset>
                            <legend>Tipo de Compra</legend>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">CONTADO</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">CREDITO</label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="lot_compras" class="control-label">Documento del Proveedor <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control col-ms-1" placeholder="0" aria-label="Username">
                                <span class="input-group-text">-</span>
                                <input type="text" class="form-control" placeholder="000" aria-label="Server">
                                <span class="input-group-text">-</span>
                                <input type="text" class="form-control" placeholder="000000" aria-label="Server">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="description_product" class="control-label">Proveedor <span class="text-danger">*</span></label>
                            <input type="text" name="description_product" id="description_product" class="form-control form-control-sm input-group-sm" aria-label="description_product" value="" placeholder="Escribe para buscar..." autofocus required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="lot_product" class="control-label">Fecha de compra<span class="text-danger">*</span></label>
                            <input type="date" name="description_product" id="description_product" class="form-control form-control-sm input-group-sm" aria-label="description_product" value="" placeholder="Escribe para buscar..." autofocus required autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="description_product" class="control-label">Codigo de Barras <span class="text-danger">*</span></label>
                            <input type="text" name="description_product" id="description_product" class="form-control form-control-sm input-group-sm" aria-label="description_product" value="" placeholder="Escribe para buscar..." autofocus required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="lot_product" class="control-label">Producto<span class="text-danger">*</span></label>
                            <input type="text" name="description_product" id="description_product" class="form-control form-control-sm input-group-sm" aria-label="description_product" value="" placeholder="Escribe para buscar..." autofocus required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="lot_product" class="control-label">Lote<span class="text-danger">*</span></label>
                            <input type="text" name="description_product" id="description_product" class="form-control form-control-sm input-group-sm" aria-label="description_product" value="" placeholder="Escribe para buscar..." autofocus required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="lot_product" class="control-label">Fecha Vencimiento<span class="text-danger">*</span></label>
                            <input type="date" name="description_product" id="description_product" class="form-control form-control-sm input-group-sm" aria-label="description_product" value="" placeholder="Escribe para buscar..." autofocus required autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1 d-flex align-items-end">
                        <div class="form-group">
                            <label for="description_product" class="control-label">Cantidad<span class="text-danger">*</span></label>
                            <input type="text" name="description_product" id="description_product" class="form-control form-control-sm input-group-sm" aria-label="description_product" value="" placeholder="..." autofocus required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-1 d-flex">
                        <div class="form-group">
                            <label for="lot_product" class="control-label">Precio Compra<span class="text-danger">*</span></label>
                            <input type="text" name="description_product" id="description_product" class="form-control form-control-sm input-group-sm" aria-label="description_product" value="" placeholder="..." autofocus required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-1 d-flex align-items-end">
                        <div class="form-group">
                            <label for="lot_product" class="control-label">Importe<span class="text-danger">*</span></label>
                            <input type="text" name="description_product" id="description_product" class="form-control form-control-sm input-group-sm" aria-label="description_product" value="" placeholder="..." autofocus required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-1 d-flex align-items-end">
                        <div class="form-group">
                            <label for="lot_product" class="control-label">Fracc<span class="text-danger">*</span></label>
                            <input type="text" name="description_product" id="description_product" class="form-control form-control-sm input-group-sm" aria-label="description_product" value="" placeholder="..." autofocus required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-1 d-flex align-items-end">
                        <div class="form-group">
                            <label for="lot_product" class="control-label">Stock<span class="text-danger">*</span></label>
                            <input type="text" name="description_product" id="description_product" class="form-control form-control-sm input-group-sm" aria-label="description_product" value="" placeholder="..." autofocus required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="lot_product" class="control-label">% Utilidad<span class="text-danger">*</span></label>
                            <input type="text" name="description_product" id="description_product" class="form-control form-control-sm input-group-sm" aria-label="description_product" value="" placeholder="..." autofocus required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="lot_product" class="control-label">Precio Venta<span class="text-danger">*</span></label>
                            <input type="text" name="description_product" id="description_product" class="form-control form-control-sm input-group-sm" aria-label="description_product" value="" placeholder="..." autofocus required autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio Unitario</th>
                                <th scope="col">Valor sin IGV</th>
                                <th scope="col">Importe total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex flex-row-reverse">
                    <form class="row g-3">
                        <div class="col-auto">
                            <label for="staticEmail2" class="visually-hidden">Valor de Venta</label>
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Valor de Venta">
                        </div>
                        <div class="col-auto">
                            <label for="inputPassword2" class="visually-hidden">Password</label>
                            <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning">Eliminar</button>
                <button type="button" class="btn btn-success">Registrar</button>
            </div>
        </div>
    </div>
</div>