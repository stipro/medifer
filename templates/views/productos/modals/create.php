<!-- Modal -->
<div class="modal fade" id="mdAdd-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form id="add_product_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">[Nuevo] Producto</h5>
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
                                        <div class="form-group">
                                            <label for="insertIpt-presentation-product" class="control-label">Presentación</label>
                                            <div class="input-group input-group-sm">
                                                <input list="insertDt-presentacion-producto" class="form-control" id="insertIpt-presentation-product" placeholder="Escribe para buscar...">
                                                <datalist id="insertDt-presentacion-producto">
                                                    <?php if (empty(get_tipo_presentaciones())) : ?>
                                                        <option value="--0--">--No se obtuvo información--</option>
                                                    <?php else : ?>

                                                        <?php foreach (get_tipo_presentaciones() as $tipo) : ?>
                                                            <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </datalist>
                                                <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-presentation"><i class="bi bi-arrow-clockwise"></i></button>
                                                <button class="btn btn-outline-secondary form-control-sm" type="button" id="mbtnAdd-presentation"><i class="bi bi-plus-lg"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insertIpt-laboratory-product" class="control-label">Laboratorio</label>
                                            <div class="input-group input-group-sm">
                                                <input list="insertDt-laboratory-producto" class="form-control" id="insertIpt-laboratory-product" placeholder="Escribe para buscar...">
                                                <datalist id="insertDt-laboratory-producto">
                                                    <?php if (empty(get_tipo_laboratorios())) : ?>
                                                        <option value="--0--">--No se obtuvo información--</option>
                                                    <?php else : ?>
                                                        <?php foreach (get_tipo_laboratorios() as $tipo) : ?>
                                                            <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </datalist>
                                                <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-laboratory"><i class="bi bi-arrow-clockwise"></i></button>
                                                <button class="btn btn-outline-secondary form-control-sm" type="button" id="mbtnAdd-laboratory"><i class="bi bi-plus-lg"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="activePrinciple_producto" class="control-label">Principio Activo <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <input list="insertDt-principoActivo-producto" type="text" name="activePrinciple_producto" id="activePrinciple_producto" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Escribe para buscar..." autofocus required>
                                        <datalist id="insertDt-principoActivo-producto">
                                            <?php if (empty(get_tipo_princiosActivo())) : ?>
                                                <option value="--0--">--No se obtuvo información--</option>
                                            <?php else : ?>
                                                <?php foreach (get_tipo_princiosActivo() as $tipo) : ?>
                                                    <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </datalist>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-activePrinciple"><i class="bi bi-arrow-clockwise"></i></button>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-activePrinciple"><i class="bi bi-plus-lg"></i></button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="indication_producto" class="control-label">Indicaciónes <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <input list="insertDt-indication-producto" type="text" name="indication_producto" id="indication_producto" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Escribe para buscar..." autofocus required>
                                        <datalist id="insertDt-indication-producto">
                                            <?php if (empty(get_tipo_indicaciones())) : ?>
                                                <option value="--0--">--No se obtuvo información--</option>
                                            <?php else : ?>
                                                <?php foreach (get_tipo_indicaciones() as $tipo) : ?>
                                                    <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </datalist>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-indication"><i class="bi bi-arrow-clockwise"></i></button>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-indication"><i class="bi bi-plus-lg"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="insertIpt-barCode-product" class="control-label">Codigo Barras</label>
                                    <input type="text" name="name" id="insertIpt-barCode-product" class="form-control form-control-sm" aria-label="Nombre" value="" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="insertIpt-group-producto" class="control-label">Grupo</label>
                                    <div class="input-group input-group-sm">
                                        <input list="insertDt-group-producto" class="form-control" id="insertIpt-group-producto" placeholder="Escribe para buscar...">
                                        <datalist id="insertDt-group-producto">
                                            <?php if (empty(get_tipo_grupos())) : ?>
                                                <option value="--0--">--No se obtuvo información--</option>
                                            <?php else : ?>
                                                <?php foreach (get_tipo_grupos() as $tipo) : ?>
                                                    <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </datalist>
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
                    <button type="button" id="mbtnInsert-product-close" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <?php echo insert_inputs(); ?>
                    <button type="submit" id="mbtnInsert-product-insert" class="btn btn-success">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>