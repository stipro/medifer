<!-- Modal -->
<div class="modal fade" id="mdEdit-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form id="edit_product_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">[Editar] Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="nombre_producto" class="control-label">Nombre <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="nombre_producto" id="nombre_producto" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Escribe para buscar..." autofocus required autocomplete="off">
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-name"><i class="bi bi-cloud-lightning-fill"></i></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>

                                        </div>
                                        <div class="form-group">
                                            <label for="editIpt-presentation-product" class="control-label">Presentación <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-sm">
                                                <!-- <input list="editDt-presentation-producto" class="form-control" id="editIpt-presentation-product" placeholder="Escribe para buscar...">
                                                <datalist id="editDt-presentation-producto">
                                                    <select name="presentation" id="editSlt-presentation-producto">
                                                    </select>
                                                </datalist> -->
                                                <select class="form-select form-select-sm" id="editIpt-presentation-product" data-placeholder="Escribe para buscar...">
                                                    <option></option>
                                                    <?php if (empty(get_tipo_presentaciones())) : ?>
                                                        <option value="--0--">--No se obtuvo información--</option>
                                                    <?php else : ?>

                                                        <?php foreach (get_tipo_presentaciones() as $tipo) : ?>
                                                            <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                                <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-presentation"><i class="bi bi-arrow-clockwise"></i></button>
                                                <button class="btn btn-outline-secondary form-control-sm" type="button" id="mbtnAdd-presentation"><i class="bi bi-plus-lg"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="editIpt-laboratory-product" class="control-label">Laboratorio <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-sm">
                                                <!-- <input list="editDt-laboratory-producto" class="form-control" id="editIpt-laboratory-product" placeholder="Escribe para buscar...">
                                                <datalist id="editDt-laboratory-producto">
                                                </datalist> -->
                                                <select class="form-select form-select-sm" id="editIpt-laboratory-product" data-placeholder="Escribe para buscar...">
                                                    <option></option>
                                                    <?php if (empty(get_tipo_laboratorios())) : ?>
                                                        <option value="--0--">--No se obtuvo información--</option>
                                                    <?php else : ?>
                                                        <?php foreach (get_tipo_laboratorios() as $tipo) : ?>
                                                            <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                                <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-laboratory"><i class="bi bi-arrow-clockwise"></i></button>
                                                <button class="btn btn-outline-secondary form-control-sm" type="button" id="mbtnAdd-laboratory"><i class="bi bi-plus-lg"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="editIpt-activePrinciple-product" class="control-label">Principio Activo <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <!-- <input list="editDt-principoActivo-producto" type="text" name="editIpt-activePrinciple-product" id="editIpt-activePrinciple-product" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Escribe para buscar..." autofocus required>
                                        <datalist id="editDt-principoActivo-producto">
                                        </datalist> -->
                                        <select class="form-select form-select-sm" id="editIpt-activePrinciple-product" data-placeholder="Escribe para buscar...">
                                            <option></option>
                                            <?php if (empty(get_tipo_princiosActivo())) : ?>
                                                <option value="--0--">--No se obtuvo información--</option>
                                            <?php else : ?>
                                                <?php foreach (get_tipo_princiosActivo() as $tipo) : ?>
                                                    <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-activePrinciple"><i class="bi bi-arrow-clockwise"></i></button>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-activePrinciple"><i class="bi bi-plus-lg"></i></button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="editIpt-indication-product" class="control-label">Indicaciónes <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <!-- <input list="editDt-indication-producto" type="text" name="editIpt-indication-product" id="editIpt-indication-product" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Escribe para buscar..." autofocus required>
                                        <datalist id="editDt-indication-producto">
                                        </datalist> -->
                                        <select class="form-select form-select-sm" id="editIpt-indication-product" data-placeholder="Escribe para buscar...">
                                            <option></option>
                                            <?php if (empty(get_tipo_indicaciones())) : ?>
                                                <option value="--0--">--No se obtuvo información--</option>
                                            <?php else : ?>
                                                <?php foreach (get_tipo_indicaciones() as $tipo) : ?>
                                                    <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-indication"><i class="bi bi-arrow-clockwise"></i></button>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-indication"><i class="bi bi-plus-lg"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="editIpt-barCode-product" class="control-label">Codigo Barras</label>
                                    <input type="text" name="name" id="editIpt-barCode-product" class="form-control form-control-sm" aria-label="Nombre" value="" autocomplete="off" placeholder="Ingrese Codigo Barras">
                                </div>
                                <div class="form-group">
                                    <label for="editIpt-group-product" class="control-label">Grupo</label>
                                    <div class="input-group input-group-sm">
                                        <!-- <input list="editDt-group-producto" class="form-control" id="editIpt-group-product" placeholder="Escribe para buscar...">
                                        <datalist id="editDt-group-producto">
                                        </datalist> -->
                                        <select class="form-select form-select-sm" id="editIpt-group-product" data-placeholder="Escribe para buscar...">
                                            <option></option>
                                            <?php if (empty(get_tipo_grupos())) : ?>
                                                <option value="--0--">--No se obtuvo información--</option>
                                            <?php else : ?>
                                                <?php foreach (get_tipo_grupos() as $tipo) : ?>
                                                    <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-group"><i class="bi bi-arrow-clockwise"></i></button>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-group"><i class="bi bi-plus-lg"></i></button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="insertIpt-group-producto" class="control-label">Concentración</label>
                                    <div class="input-group input-group-sm">
                                        <input class="form-control" list="insertDt-concentration-producto" id="insertIpt-concentration-producto" placeholder="Ingrese Concentración" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="mbtnEdit-product-close" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <?php echo insert_inputs(); ?>
                    <button type="submit" id="mbtnEdit-product-insert" class="btn btn-success">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>