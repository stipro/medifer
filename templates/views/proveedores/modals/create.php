<!-- Modal -->
<div class="modal fade" id="mdAdd-provider" tabindex="-1" aria-labelledby="mdAdd-providerLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="add_provider_form">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdAdd-providerLabel">[Nuevo] Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="row">
                        <div class="col">
                            <label for="insertIpt-name-provider" class="form-label">Nombre ó Razon Social</label>
                            <input type="text" class="form-control" id="insertIpt-name-provider" name="name-provider" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="insertIpt-documentNumber-provider" class="form-label">RUC / DNI</label>
                            <input type="number" class="form-control" id="insertIpt-documentNumber-provider" name="documentNumber-provider">
                        </div>
                        <div class="col">
                            <label for="insertIpt-numberPhone-provider" class="form-label">Telefono / Celular</label>
                            <input type="number" class="form-control" id="insertIpt-numberPhone-provider" name="numberPhone-provider">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="insertIpt-email-provider" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="insertIpt-email-provider" name="email-provider">
                        </div>
                        <div class="col">
                            <label for="insertIpt-residueInitial-provider" class="form-label">Saldo Inicial</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="insertIpt-residueInitial-provider" name="residueInitial-provider" placeholder="0.00">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="d-inline-block me-1">Desactivado</div>
                            <div class="form-check form-switch d-inline-block">
                                <input type="checkbox" class="form-check-input" id="insertCb-state-provider" name="state-provider" style="cursor: pointer;">
                                <label for="insertCb-state-provider" class="form-check-label">Activado</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="mbtnInsert-provider-close" data-bs-dismiss="modal">Cerrar</button>
                    <?php echo insert_inputs(); ?>
                    <button type="submit" class="btn btn-success" id="mbtnInsert-provider-insert">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>