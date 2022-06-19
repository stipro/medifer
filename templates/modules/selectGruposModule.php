<option></option>
<?php if (empty(get_tipo_grupos())) : ?>
    <option value="--0--">--No se obtuvo informacion--</option>
<?php else : ?>
    <?php foreach (get_tipo_grupos() as $tipo) : ?>
        <?php echo sprintf('<option value="%s" data-id="%s">%s</option>', $tipo[0], $tipo[1], $tipo[2]); ?>
    <?php endforeach; ?>
<?php endif; ?>