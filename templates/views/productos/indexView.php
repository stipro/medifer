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
      <div class="wrapper_product table-responsive">

      </div>
    </div>
  </div>
</div>
<?php require_once INCLUDES . 'inc_footer.php'; ?>
<?php require_once VIEWS . 'productos/modals/create.php'; ?>
<?php require_once VIEWS . 'productos/modals/read.php'; ?>
<?php require_once VIEWS . 'productos/modals/update.php'; ?>
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