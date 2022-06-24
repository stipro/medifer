<!-- Modal -->
<div class="modal fade" id="mdAdd-user" tabindex="-1" aria-labelledby="mdAdd-userLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdAdd-userLabel">[Nuevo] Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <label for="insertSlt-collaborator-user" class="form-label">Colaborador</label>
                        <div class="input-group">
                            <span class="input-group-text">@</span>
                            <select class="form-select" id="insertSlt-collaborator-user" data-placeholder="Seleccione Colaborador...">
                                <option></option>
                                <option>Colaborador 1</option>
                                <option>Colaborador 2</option>
                                <option>Colaborador 3</option>
                                <option>Colaborador 4</option>
                                <option>Colaborador 5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <label for="insertIpt-name-user" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="insertIpt-name-user">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="insertIpt-password-user" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="insertIpt-password-user">
                    </div>
                    <div class="col">
                        <label for="insertIpt-passwordRepeat-user" class="form-label">Repetir contraseña</label>
                        <input type="password" class="form-control" id="insertIpt-passwordRepeat-user">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="insertSlt-userLevel-user" class="form-label">Nivel Usuario</label>
                        <div class="input-group">
                            <span class="input-group-text">@</span>
                            <select class="form-select" id="insertSlt-userLevel-user" data-placeholder="Seleccione Nivel de Usuario...">
                                <option></option>
                                <option>VENDEDOR - CAJERO</option>
                                <option>VENDEDOR</option>
                                <option>CAJERO</option>
                                <option>SUPER ADMINISTRADOR</option>
                                <option>FACTURACIÓN</option>
                                <option>CONTADOR</option>
                                <option>ALMACENERO</option>
                                <option>ADMINISTRADOR</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <label for="insertSlt-store-user" class="form-label">Tienda</label>
                        <div class="input-group">
                            <span class="input-group-text">@</span>
                            <select class="form-select" id="insertSlt-store-user" data-placeholder="Seleccione Tienda...">
                                <option></option>
                                <option>Tienda - 1</option>
                                <option>Tienda - 2</option>
                                <option>Tienda - 3</option>
                                <option>Tienda - 4</option>
                                <option>Tienda - 5</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="insertIpt-password-user" class="form-label">Fecha Nacimiento</label>
                        <input type="date" class="form-control" id="insertIpt-password-user">
                    </div>
                    <div class="col">
                        <label for="insertIpt-passwordRepeat-user" class="form-label">Numero Celular</label>
                        <input type="tel" class="form-control" id="insertIpt-passwordRepeat-user">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="insertIpt-password-user" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="insertIpt-password-user">
                    </div>
                    <div class="col">
                    </div>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Activo</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </div>
</div>