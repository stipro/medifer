<!-- Modal -->
<div class="modal fade" id="mdView-provider" tabindex="-1" aria-labelledby="mdView-providerLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="view_provider_form">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdView-providerLabel">[Vista] Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="row">
                        <div class="col">
                            <label for="viewIpt-name-provider" class="form-label">Nombre ó Razon Social</label>
                            <input type="text" class="form-control" id="viewIpt-name-provider" name="name-provider" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="viewIpt-documentNumber-provider" class="form-label">RUC / DNI</label>
                            <input type="number" class="form-control" id="viewIpt-documentNumber-provider" name="documentNumber-provider" disabled>
                        </div>
                        <div class="col">
                            <label for="viewIpt-numberPhone-provider" class="form-label">Telefono / Celular</label>
                            <input type="number" class="form-control" id="viewIpt-numberPhone-provider" name="numberPhone-provider" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="viewIpt-email-provider" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="viewIpt-email-provider" name="email-provider" disabled>
                        </div>
                        <div class="col">
                            <label for="viewIpt-residueInitial-provider" class="form-label">Saldo Inicial</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="viewIpt-residueInitial-provider" name="residueInitial-provider" placeholder="0.00" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="d-inline-block me-1">Desactivado</div>
                            <div class="form-check form-switch d-inline-block">
                                <input type="checkbox" class="form-check-input" id="viewCb-state-provider" name="state-provider" style="cursor: pointer;" disabled>
                                <label for="viewCb-state-provider" class="form-check-label">Activado</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="mbtnView-provider-close" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>