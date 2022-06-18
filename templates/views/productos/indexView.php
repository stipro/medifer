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
      <div class="table-responsive">
        <?php if (empty($d->productos->rows)) : ?>
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
              <?php foreach ($d->productos->rows as $t) : ?>
                <tr>
                  <th scope="row"><?php echo ($i); ?></th>
                  <td><?php echo $t->nombre_producto;
                      $i++; ?></td>
                  <td class="text-center" style="width:15rem;">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#mdView-presentation" class="btn btn-info btn-sm btnView_presentacion" data-id="<?php echo $t->id_producto; ?>">
                      <i class="fas fa-eye"></i>
                    </button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#mdEdit-presentation" class="btn btn-warning btn-sm btnEdit_presentacion" data-id="<?php echo $t->id_producto; ?>">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm delete_presentacion" data-id="<?php echo $t->id_producto; ?>"><i class="fas fa-trash"></i></button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?php echo $d->productos->pagination; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php require_once INCLUDES . 'inc_footer.php'; ?>
<?php require_once VIEWS . 'productos/modals/create.php'; ?>
<script>
  /*   const btnCreate_insert = document.getElementById("add-product");
  btnCreate_insert.addEventListener("click", (e) => {
    let form_request = {
        "action": "getSelec_dni_fullname"
    }
    requestTbl_products(form_request);
    console.log('Se hizo click');
  });
  const requestTbl_products = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch("./app/controllers/ajaxController.php", {
        method: "POST",
        body
    });
    const data = await res.json() //await JSON.parse(returned);
    console.log(data);
} */
</script>