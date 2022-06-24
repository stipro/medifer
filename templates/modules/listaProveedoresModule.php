<div class="table-responsive">
  <?php if (empty($d->rows)) : ?>
    <div class="text-center">
      <p class="text-muted">
        No se encontro registros
      </p>
    </div>
  <?php else : ?>
    <table class="table table-sm table-hover table-striped table-bordered caption-top">
      <caption>Lista</caption>
      <thead class="table-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">RUC / DNI</th>
          <th scope="col">Nombre / Razon Social</th>
          <th scope="col">Telfono / Celular</th>
          <th scope="col">Correo</th>
          <th scope="col">Saldo Inicial</th>
          <th scope="col">Dirección</th>
          <th scope="col">Estado</th>
          <th scope="col">Acción</th>
        </tr>
      </thead>
      <?php $i = 1 ?>
      <tbody class="table-group-divider">
        <?php foreach ($d->rows as $t) : ?>
          <tr>
            <th scope="row"><?php echo ($i); ?></th>
            <td><?php echo $t->numeroDocumento_proveedor;
                $i++; ?></td>
            <td><?php echo $t->nombre_proveedor; ?></td>
            <td><?php echo $t->celular_proveedor; ?></td>
            <td><?php echo $t->correoElectronivo_proveedor; ?></td>
            <td><?php echo $t->saldoInicial_proveedor; ?></td>
            <td><?php echo $t->direccion_proveedor; ?></td>
            <td>
              <?php if ($t->estado_proveedor) : ?>
                <span class="badge text-bg-success">Activo</span>
              <?php else : ?>
                <span class="badge text-bg-warning">Desactivado</span>
              <?php endif; ?>
            </td>
            <td class="text-center" style="width:15rem;">
              <button type="button" data-bs-toggle="modal" data-bs-target="#mdView-provider" class="btn btn-info btn-sm btnView_provider" data-id="<?php echo $t->id_proveedor; ?>">
                <i class="fas fa-eye"></i>
              </button>
              <button type="button" data-bs-toggle="modal" data-bs-target="#mdEdit-provider" class="btn btn-warning btn-sm btnEdit_provider" data-id="<?php echo $t->id_proveedor; ?>">
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
              <button type="button" class="btn btn-danger btn-sm btnDelete_provider" data-id="<?php echo $t->id_proveedor; ?>"><i class="fas fa-trash"></i></button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php echo $d->pagination; ?>
  <?php endif; ?>
</div>