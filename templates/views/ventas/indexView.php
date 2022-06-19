<?php require_once INCLUDES . 'inc_header.php'; ?>
<?php require_once INCLUDES . 'inc_navbar.php'; ?>
<div class="container py-3">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h3 class="card-title">Lista de <?php echo $d->title; ?></h3>
      <div>
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#mdAdd-product" id="add-product">Agregar nuevo</button>
      </div>
    </div>
    <div class="card-body">
      <div class="wrapper_sales table-responsive">

      </div>
    </div>
  </div>
</div>
<?php require_once INCLUDES . 'inc_footer.php'; ?>
<?php require_once VIEWS . 'sales/modals/create.php'; ?>
<?php require_once VIEWS . 'sales/modals/read.php'; ?>
<?php require_once VIEWS . 'sales/modals/update.php'; ?>