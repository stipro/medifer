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
                <th scope="col">Nombre</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <?php $i = 1 ?>
        <tbody class="table-group-divider">
            <?php foreach ($d->rows as $t) : ?>
                <tr>
                    <th scope="row"><?php echo ($i); ?></th>
                    <td><?php echo $t->nombre_indicacion;
                        $i++; ?></td>
                    <td class="text-center" style="width:15rem;">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#mdView-indication" class="btn btn-info btn-sm btnView_indication" data-id="<?php echo $t->id_indicacion; ?>">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#mdEdit-indication" class="btn btn-warning btn-sm btnEdit_indication" data-id="<?php echo $t->id_indicacion; ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm btnDelete_indication" data-id="<?php echo $t->id_indicacion; ?>"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $d->pagination; ?>
<?php endif; ?>