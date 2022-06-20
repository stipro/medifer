<!-- Modal -->
<div class="modal fade" id="mdAdd-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form id="add_product_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">[Nuevo] Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="nombre_producto" class="control-label">Nombre <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="name_product" id="name_product" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Escribe para buscar..." autofocus required autocomplete="off">
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-name"><i class="bi bi-cloud-lightning-fill"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="insertIpt-barCode-product" class="control-label">Codigo Barras</label>
                                <input type="text" name="barCode_product" id="barCode_product" class="form-control form-control-sm" aria-label="Nombre" value="" autocomplete="off" placeholder="Ingrese Codigo Barras">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="insertIpt-presentation-product" class="control-label">Presentación <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <!-- <input list="insertDt-presentation-producto" class="form-control" id="insertIpt-presentation-product" placeholder="Escribe para buscar...">
                                                <datalist id="insertDt-presentation-producto">
                                                    <select name="presentation" id="insertSlt-presentation-producto">
                                                    </select>
                                                </datalist> -->
                                    <select class="form-select form-select-sm" name="presentation-product" id="insertIpt-presentation-product" data-placeholder="Escribe para buscar...">
                                        <option></option>
                                        <?php if (empty(get_tipo_presentaciones())) : ?>
                                            <option value="--0--">--No se obtuvo información--</option>
                                        <?php else : ?>

                                            <?php foreach (get_tipo_presentaciones() as $tipo) : ?>
                                                <?php echo sprintf('<option value="%s" data-id="%s">%s</option>', $tipo[0], $tipo[1], $tipo[2]); ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-presentation"><i class="bi bi-arrow-clockwise"></i></button>
                                    <a class="btn btn-outline-secondary form-control-sm" href="./presentaciones" role="button" id="mbtnAdd-presentation" target="_blank"><i class="bi bi-plus-lg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="insertIpt-laboratory-product" class="control-label">Laboratorio <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <!-- <input list="insertDt-laboratory-producto" class="form-control" id="insertIpt-laboratory-product" placeholder="Escribe para buscar...">
                                                <datalist id="insertDt-laboratory-producto">
                                                </datalist> -->
                                    <select class="form-select form-select-sm" id="insertIpt-laboratory-product" data-placeholder="Escribe para buscar...">
                                        <option></option>
                                        <?php if (empty(get_tipo_laboratorios())) : ?>
                                            <option value="--0--">--No se obtuvo información--</option>
                                        <?php else : ?>
                                            <?php foreach (get_tipo_laboratorios() as $tipo) : ?>
                                                <?php echo sprintf('<option value="%s" data-id="%s">%s</option>', $tipo[0], $tipo[1], $tipo[2]); ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-laboratory"><i class="bi bi-arrow-clockwise"></i></button>
                                    <a class="btn btn-outline-secondary form-control-sm" href="./laboratorios" role="button" id="mbtnAdd-laboratory" target="_blank"><i class="bi bi-plus-lg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="insertIpt-group-product" class="control-label">Grupo</label>
                                <div class="input-group input-group-sm">
                                    <!-- <input list="insertDt-group-producto" class="form-control" id="insertIpt-group-product" placeholder="Escribe para buscar...">
                                        <datalist id="insertDt-group-producto">
                                        </datalist> -->
                                    <select class="form-select form-select-sm" id="insertIpt-group-product" data-placeholder="Escribe para buscar...">
                                        <option></option>
                                        <?php if (empty(get_tipo_grupos())) : ?>
                                            <option value="--0--">--No se obtuvo información--</option>
                                        <?php else : ?>
                                            <?php foreach (get_tipo_grupos() as $tipo) : ?>
                                                <?php echo sprintf('<option value="%s" data-id="%s">%s</option>', $tipo[0], $tipo[1], $tipo[2]); ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-group"><i class="bi bi-arrow-clockwise"></i></button>
                                    <a class="btn btn-outline-secondary form-control-sm" href="./grupos" role="button" id="mbtnAdd-group" target="_blank"><i class="bi bi-plus-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="insertIpt-activePrinciple-product" class="control-label">Principio Activo <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <!-- <input list="insertDt-principoActivo-producto" type="text" name="insertIpt-activePrinciple-product" id="insertIpt-activePrinciple-product" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Escribe para buscar..." autofocus required>
                                        <datalist id="insertDt-principoActivo-producto">
                                        </datalist> -->
                                    <select class="form-select form-select-sm" id="insertIpt-activePrinciple-product" data-placeholder="Escribe para buscar...">
                                        <option></option>
                                        <?php if (empty(get_tipo_princiosActivo())) : ?>
                                            <option value="--0--">--No se obtuvo información--</option>
                                        <?php else : ?>
                                            <?php foreach (get_tipo_princiosActivo() as $tipo) : ?>
                                                <?php echo sprintf('<option value="%s" data-id="%s">%s</option>', $tipo[0], $tipo[1], $tipo[2]); ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-activePrinciple"><i class="bi bi-arrow-clockwise"></i></button>
                                    <a class="btn btn-outline-secondary form-control-sm" href="./principioactivo" role="button" id="mbtnAdd-activePrinciple" target="_blank"><i class="bi bi-plus-lg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="insertIpt-group-producto" class="control-label">Concentración</label>
                                <div class="input-group input-group-sm">
                                    <input class="form-control" list="insertDt-concentration-producto" name="concentration-product" id="insertIpt-concentration-product" placeholder="Ingrese Concentración" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="insertIpt-indication-product" class="control-label">Indicaciónes <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <!-- <input list="insertDt-indication-producto" type="text" name="insertIpt-indication-product" id="insertIpt-indication-product" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Escribe para buscar..." autofocus required>
                                        <datalist id="insertDt-indication-producto">
                                        </datalist> -->
                                    <select class="form-select form-select-sm" id="insertIpt-indication-product" data-placeholder="Escribe para buscar...">
                                        <option></option>
                                        <?php if (empty(get_tipo_indicaciones())) : ?>
                                            <option value="--0--">--No se obtuvo información--</option>
                                        <?php else : ?>
                                            <?php foreach (get_tipo_indicaciones() as $tipo) : ?>
                                                <?php echo sprintf('<option value="%s" data-id="%s">%s</option>', $tipo[0], $tipo[1], $tipo[2]); ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-indication"><i class="bi bi-arrow-clockwise"></i></button>
                                    <a class="btn btn-outline-secondary form-control-sm" href="./indicaciones" role="button" id="mbtnAdd-indication" target="_blank"><i class="bi bi-plus-lg"></i></a>
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