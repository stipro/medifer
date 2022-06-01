<?php if(empty($d->rows)): ?>
<div class="text-center">
    <p class="text-muted">
        No se encontro registros
    </p>
</div>
<?php else: ?>
<table class="table table-sm table-hover table-striped table-bordered caption-top">
    <caption>Lista</caption>
    <thead class="table-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <?php $i = 1?>
    <tbody class="table-group-divider">
        <?php foreach($d->rows as $t): ?>
        <tr>
            <th scope="row"><?php echo ($i) ; ?></th>
            <td><?php echo $t->nombre_laboratorio; $i++;?></td>
            <td>
                <div class="btn group">
                    <a href="" class="btn btn-success btn-sm">
                        <i class="fas fa-eye">
                        </i>
                    </a>
                    <a href="" class="btn btn-danger btn-sm confirmar">
                    <i class="fas fa-trash"></i>
                    </a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php echo $d->pagination; ?>
<?php endif; ?>