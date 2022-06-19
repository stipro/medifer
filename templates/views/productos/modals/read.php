<!-- Modal -->
<div class="modal fade" id="mdView-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form id="view_product_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">[Vista] Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="nombre_producto" class="control-label">Nombre <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="nombre_producto" id="nombre_producto" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Error al cargar ..." autofocus required autocomplete="off" disabled>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-name" disabled><i class="bi bi-cloud-lightning-fill"></i></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>

                                        </div>
                                        <div class="form-group">
                                            <label for="viewIpt-presentation-product" class="control-label">Presentación <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-sm">
                                                <!-- <input list="viewDt-presentation-producto" class="form-control" id="viewIpt-presentation-product" placeholder="Escribe para buscar...">
                                                <datalist id="viewDt-presentation-producto">
                                                    <select name="presentation" id="viewSlt-presentation-producto">
                                                    </select>
                                                </datalist> -->
                                                <select class="form-select form-select-sm" id="viewIpt-presentation-product" data-placeholder="Escribe para buscar..." disabled>
                                                    <!-- <option>Error al cargar ...</option> -->
                                                </select>
                                                <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-presentation" disabled><i class="bi bi-arrow-clockwise"></i></button>
                                                <button class="btn btn-outline-secondary form-control-sm" type="button" id="mbtnAdd-presentation" disabled><i class="bi bi-plus-lg"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="viewIpt-laboratory-product" class="control-label">Laboratorio <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-sm">
                                                <!-- <input list="viewDt-laboratory-producto" class="form-control" id="viewIpt-laboratory-product" placeholder="Escribe para buscar...">
                                                <datalist id="viewDt-laboratory-producto">
                                                </datalist> -->
                                                <select class="form-select form-select-sm" id="viewIpt-laboratory-product" data-placeholder="Escribe para buscar..." disabled>
                                                    <option></option>
                                                    <?php if (empty(get_tipo_laboratorios())) : ?>
                                                        <option value="--0--">--No se obtuvo información--</option>
                                                    <?php else : ?>
                                                        <?php foreach (get_tipo_laboratorios() as $tipo) : ?>
                                                            <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                                <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-laboratory" disabled><i class="bi bi-arrow-clockwise"></i></button>
                                                <button class="btn btn-outline-secondary form-control-sm" type="button" id="mbtnAdd-laboratory" disabled><i class="bi bi-plus-lg"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="viewIpt-activePrinciple-product" class="control-label">Principio Activo <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <!-- <input list="viewDt-principoActivo-producto" type="text" name="viewIpt-activePrinciple-product" id="viewIpt-activePrinciple-product" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Escribe para buscar..." autofocus required>
                                        <datalist id="viewDt-principoActivo-producto">
                                        </datalist> -->
                                        <select class="form-select form-select-sm" id="viewIpt-activePrinciple-product" data-placeholder="Escribe para buscar..." disabled>
                                            <option></option>
                                            <?php if (empty(get_tipo_princiosActivo())) : ?>
                                                <option value="--0--">--No se obtuvo información--</option>
                                            <?php else : ?>
                                                <?php foreach (get_tipo_princiosActivo() as $tipo) : ?>
                                                    <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-activePrinciple" disabled><i class="bi bi-arrow-clockwise"></i></button>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-activePrinciple" disabled><i class="bi bi-plus-lg"></i></button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="viewIpt-indication-product" class="control-label">Indicaciónes <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <!-- <input list="viewDt-indication-producto" type="text" name="viewIpt-indication-product" id="viewIpt-indication-product" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Escribe para buscar..." autofocus required>
                                        <datalist id="viewDt-indication-producto">
                                        </datalist> -->
                                        <select class="form-select form-select-sm" id="viewIpt-indication-product" data-placeholder="Escribe para buscar..." disabled>
                                            <option></option>
                                            <?php if (empty(get_tipo_indicaciones())) : ?>
                                                <option value="--0--">--No se obtuvo información--</option>
                                            <?php else : ?>
                                                <?php foreach (get_tipo_indicaciones() as $tipo) : ?>
                                                    <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-indication" disabled><i class="bi bi-arrow-clockwise"></i></button>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-indication" disabled><i class="bi bi-plus-lg"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="viewIpt-barCode-product" class="control-label">Codigo Barras</label>
                                    <input type="text" name="barCode_product" id="viewIpt-barCode-product" class="form-control form-control-sm" aria-label="Nombre" value="" autocomplete="off" placeholder="Error al cargar ..." disabled>
                                </div>
                                <div class="form-group">
                                    <label for="viewIpt-group-product" class="control-label">Grupo</label>
                                    <div class="input-group input-group-sm">
                                        <!-- <input list="viewDt-group-producto" class="form-control" id="viewIpt-group-product" placeholder="Escribe para buscar...">
                                        <datalist id="viewDt-group-producto">
                                        </datalist> -->
                                        <select class="form-select form-select-sm" id="viewIpt-group-product" data-placeholder="Escribe para buscar..." disabled>
                                            <option></option>
                                            <?php if (empty(get_tipo_grupos())) : ?>
                                                <option value="--0--">--No se obtuvo información--</option>
                                            <?php else : ?>
                                                <?php foreach (get_tipo_grupos() as $tipo) : ?>
                                                    <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-group" disabled><i class="bi bi-arrow-clockwise"></i></button>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-group" disabled><i class="bi bi-plus-lg"></i></button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="viewIpt-group-producto" class="control-label">Concentración</label>
                                    <div class="input-group input-group-sm">
                                        <input class="form-control" name="concentration_producto" id="viewIpt-concentration-producto" placeholder="Error al cargar ..." autocomplete="off" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="mbtnView-product-close" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </form>
    </div>
</div>