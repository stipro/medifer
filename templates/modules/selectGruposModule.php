<?php if(empty(get_tipo_grupos())):?>
    <option value="--0--">--No se obtuvo informacion--</option>
<?php else:?>
                                            
<?php foreach (get_tipo_grupos() as $tipo): ?>
<?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
<?php endforeach; ?>
<?php endif; ?>