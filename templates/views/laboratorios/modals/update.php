<!-- Modal -->
<div class="modal fade" id="mdEdit-laboratory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <form id="edit_laboratory_form">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">[Editar] Laboratorio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="col-12">
            <div class="row">
              <div class="col-12">
                <input type="hidden" name="id" value="" required>
                <div class="form-group">
                  <label for="nombre_laboratory" class="control-label">Nombre <span class="text-danger">*</span></label>
                  <div class="input-group input-group-sm">
                    <input type="text" name="nombre_laboratory" id="nombre_laboratory" class="form-control form-control-sm" aria-label="Nombre" value="" autofocus required autocomplete="off">
                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-name"><i class="bi bi-cloud-lightning-fill"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="mbtnInsert-laboratory-close" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <?php echo insert_inputs(); ?>
          <button type="submit" id="mbtnInsert-laboratory-insert" class="btn btn-success">Registrar</button>
        </div>
      </div>
    </form>
  </div>
</div>