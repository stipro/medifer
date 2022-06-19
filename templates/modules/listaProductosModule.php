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
          <th scope="col">Codigo Barras</th>
          <th scope="col">Nombre</th>
          <th scope="col">Presentación</th>
          <th scope="col">Laboratorio</th>
          <th scope="col">Grupo</th>
          <th scope="col">Principios Activo</th>
          <th scope="col">Indicacion</th>
          <th scope="col">Concentración</th>
          <th scope="col">Acción</th>
        </tr>
      </thead>
      <?php $i = 1 ?>
      <tbody class="table-group-divider">
        <?php foreach ($d->rows as $t) : ?>
          <tr>
            <th scope="row"><?php echo ($i); ?></th>
            <td><?php echo $t->codigoBarras_producto;
                $i++; ?></td>
            <td><?php echo $t->nombre_producto; ?></td>
            <td><?php echo $t->nombre_presentacion; ?></td>
            <td><?php echo $t->nombre_laboratorio; ?></td>
            <td><?php echo $t->nombre_grupo; ?></td>
            <td><?php echo $t->nombre_principioActivo; ?></td>
            <td><?php echo $t->nombre_indicacion; ?></td>
            <td><?php echo $t->concentracion_producto; ?></td>
            <td class="text-center" style="width:15rem;">
              <button type="button" data-bs-toggle="modal" data-bs-target="#mdView-product" class="btn btn-info btn-sm btnView_product" data-id="<?php echo $t->id_producto; ?>">
                <i class="fas fa-eye"></i>
              </button>
              <button type="button" data-bs-toggle="modal" data-bs-target="#mdEdit-product" class="btn btn-warning btn-sm btnEdit_product" data-id="<?php echo $t->id_producto; ?>">
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
              <button type="button" class="btn btn-danger btn-sm btnDelete_product" data-id="<?php echo $t->id_producto; ?>"><i class="fas fa-trash"></i></button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php echo $d->pagination; ?>
  <?php endif; ?>
</div>