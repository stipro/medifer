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
                                <input type="text" name="nombre_producto"  id="nombre_producto"  class="form-control form-control-sm" aria-label="Nombre" value="" autofocus required>
                                <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-name"><i class="bi bi-cloud-lightning-fill"></i></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="insertIpt-presentation-product" class="control-label">Presentación</label>
                                    <div class="input-group input-group-sm">
                                        <input class="form-control" list="insertDt-presentacion-producto" id="insertIpt-presentation-product" placeholder="Escribe para buscar...">
                                        <datalist id="insertDt-presentacion-producto">
                                            <?php if(empty(get_tipo_presentaciones())):?>
                                                <option value="--0--">--No se obtuvo informacion--</option>
                                            <?php else:?>
                                            
                                            <?php foreach (get_tipo_presentaciones() as $tipo): ?>
                                            <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </datalist>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-presentation"><i class="bi bi-arrow-clockwise"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="insertIpt-laboratory-product" class="control-label">Laboratorio</label>
                                    <div class="input-group input-group-sm">
                                        <input class="form-control" list="insertDt-laboratory-producto" id="insertIpt-laboratory-product" placeholder="Escribe para buscar...">
                                        <datalist id="insertDt-laboratory-producto">
                                            <option value="--Seleccione--">--Seleccione--</option>
                                        </datalist>
                                        <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-laboratory"><i class="bi bi-plus-lg"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="insertIpt-barCode-product" class="control-label">Codigo Barras</label>
                            <input type="text" name="name"  id="insertIpt-barCode-product"  class="form-control form-control-sm" aria-label="Nombre" value="">
                        </div>
                        <div class="form-group">
                            <label for="insertIpt-group-producto" class="control-label">Grupo</label>
                            <div class="input-group input-group-sm">
                                <input class="form-control" list="insertDt-group-producto" id="insertIpt-group-producto" placeholder="Escribe para buscar...">
                                <datalist id="insertDt-group-producto">
                                    <option value="--Seleccione--">--Seleccione--</option>
                                </datalist>
                                <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-group"><i class="bi bi-plus-lg"></i></button>
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