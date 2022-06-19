<?php

class ajaxController extends Controller
{

  private $accepted_actions = ['get', 'post', 'put', 'delete', 'options', 'add', 'load'];
  private $required_params  = ['hook', 'action'];

  function __construct()
  {
    foreach ($this->required_params as $param) {
      if (!isset($_POST[$param])) {
        json_output(json_build(403));
      }
    }

    if (!in_array($_POST['action'], $this->accepted_actions)) {
      json_output(json_build(403));
    }
  }

  function index()
  {
    /**
    200 OK
    201 Created
    300 Multiple Choices
    301 Moved Permanently
    302 Found
    304 Not Modified
    307 Temporary Redirect
    400 Bad Request
    401 Unauthorized
    403 Forbidden
    404 Not Found
    410 Gone
    500 Internal Server Error
    501 Not Implemented
    503 Service Unavailable
    550 Permission denied
     */
    json_output(json_build(403));
  }

  function add_presentation_form()
  {
    try {
      $nombre = clean($_POST['nombre_presentation']);

      /* if(strlen($nombre) < 2){
        json_output(json_build(400, null, 'El nombre es corto'));
      } */
      $data =
        [
          'nombre_presentacion' => $nombre,
          'dateCreation'        => now(),
          'dateUpdate'          => now()
        ];
      if (!$id = presentacionesModel::add(presentacionesModel::$t1, $data)) {
        json_output(json_build(400, null, 'Hubo error al guardar el registro'));
      }

      // se guardó con éxito
      $presentaciones = presentacionesModel::by_id($id);
      json_output(json_build(201, $presentaciones, 'Presentacion agregado con exito. '));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function get_presentaciones()
  {
    try {
      /* debug(productosModel::all_paginated());
      die; */
      $data = get_module('listaPresentaciones', presentacionesModel::all_paginated());
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  function get_presentation_form()
  {
    try {
      $id = clean($_POST['id']);
      if (!$presentacion = presentacionesModel::by_id($id)) {
        throw new PDOException('La lección no existe en la base de datos.');
      }

      json_output(json_build(200, $presentacion));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function update_presentacion_form()
  {
    try {
      $id          = (int) $_POST['id']; // id lección
      $nombre_presentation      = clean($_POST['nombre_presentation']);
      $data =
        [
          'nombre_presentacion'      => $nombre_presentation,
        ];

      if (!presentacionesModel::update(presentacionesModel::$t1, ['id_presentacion' => $id], $data)) {
        json_output(json_build(400, null, 'Hubo un error al actualizar la presentación.'));
      }

      // se guardó con éxito
      $leccion = presentacionesModel::by_id($id);
      json_output(json_build(200, $leccion, 'presentación actualizada con éxito.'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function getSelect_presentacion()
  {
    try {
      /* debug(productosModel::all_paginated());
      die; */
      $data = get_module('selectPresentaciones', presentacionesModel::all());
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  function delete_presentacion()
  {
    try {
      $id_presentacion = clean($_POST['id']);

      // Validar que exista la presentación
      if (!$presentacion = presentacionesModel::by_id($id_presentacion)) {
        throw new Exception('No existe la presentación en la base de datos.');
      }

      if (!presentacionesModel::remove(presentacionesModel::$t1, ['id_presentacion' => $id_presentacion], 1)) {
        json_output(json_build(400, null, 'Hubo un error al borrar la presentación.'));
      }

      json_output(json_build(200, null, 'presentación borrada con éxito.'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }
  /**
   * LABORATORIO
   */
  function get_laboratorios()
  {
    try {
      /* debug(productosModel::all_paginated());
      die; */
      $data = get_module('listaLaboratorios', laboratoriosModel::all_paginated());
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  function add_laboratorio_form()
  {
    try {
      $nombre = clean($_POST['nombre_laboratory']);

      /* if(strlen($nombre) < 2){
        json_output(json_build(400, null, 'El nombre es corto'));
      } */
      $data =
        [
          'nombre_laboratorio' => $nombre,
          'dateCreation'        => now(),
          'dateUpdate'          => now()
        ];
      if (!$id = laboratoriosModel::add(laboratoriosModel::$t1, $data)) {
        json_output(json_build(400, null, 'Hubo error al guardar el registro'));
      }

      // se guardó con éxito
      $laboratorios = laboratoriosModel::by_id($id);
      json_output(json_build(201, $laboratorios, 'Laboratorio agregado con exito. '));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function update_laboratorio_form()
  {
    try {
      $id          = (int) $_POST['id']; // id lección
      $nombre_laboratorio      = clean($_POST['nombre_laboratory']);
      $data =
        [
          'nombre_laboratorio'      => $nombre_laboratorio,
        ];

      if (!laboratoriosModel::update(laboratoriosModel::$t1, ['id_laboratorio' => $id], $data)) {
        json_output(json_build(400, null, 'Hubo un error al actualizar la presentación.'));
      }

      // se guardó con éxito
      $leccion = laboratoriosModel::by_id($id);
      json_output(json_build(200, $leccion, 'presentación actualizada con éxito.'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function delete_laboratorio()
  {
    try {
      $id_laboratorio = clean($_POST['id']);

      // Validar que exista la presentación
      if (!$laboratorio = laboratoriosModel::by_id($id_laboratorio)) {
        throw new Exception('No existe la laboratorio en la base de datos.');
      }

      if (!laboratoriosModel::remove(laboratoriosModel::$t1, ['id_laboratorio' => $id_laboratorio], 1)) {
        json_output(json_build(400, null, 'Hubo un error al borrar la laboratorio.'));
      }

      json_output(json_build(200, null, 'laboratorio borrada con éxito.'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function get_laboratory_form()
  {
    try {
      $id = clean($_POST['id']);
      if (!$presentacion = laboratoriosModel::by_id($id)) {
        throw new PDOException('El Laboratorio no existe en la base de datos.');
      }

      json_output(json_build(200, $presentacion));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function getSelect_laboratorio()
  {
    try {
      /* debug(productosModel::all_paginated());
      die; */
      $data = get_module('selectLaboratorios', laboratoriosModel::all());
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  /**
   * GRUPO
   */
  function get_groups()
  {
    try {
      /* debug(productosModel::all_paginated());
      die; */
      $data = get_module('listaGrupos', gruposModel::all_paginated());
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  function add_group_form()
  {
    try {
      $nombre = clean($_POST['nombre_group']);

      /* if(strlen($nombre) < 2){
        json_output(json_build(400, null, 'El nombre es corto'));
      } */
      $data =
        [
          'nombre_grupo' => $nombre,
          'dateCreation'        => now(),
          'dateUpdate'          => now()
        ];
      if (!$id = gruposModel::add(gruposModel::$t1, $data)) {
        json_output(json_build(400, null, 'Hubo error al guardar el registro'));
      }

      // se guardó con éxito
      $grupos = gruposModel::by_id($id);
      json_output(json_build(201, $grupos, 'Guarda agregado con exito. '));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function get_grupos_form()
  {
    try {
      $id = clean($_POST['id']);
      if (!$presentacion = gruposModel::by_id($id)) {
        throw new PDOException('El grupo no existe en la base de datos.');
      }

      json_output(json_build(200, $presentacion));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function update_group_form()
  {
    try {
      $id          = (int) $_POST['id']; // id lección
      $nombre_grupo      = clean($_POST['nombre_group']);
      $data =
        [
          'nombre_grupo'      => $nombre_grupo,
        ];

      if (!gruposModel::update(gruposModel::$t1, ['id_grupo' => $id], $data)) {
        json_output(json_build(400, null, 'Hubo un error al actualizar la grupo.'));
      }

      // se guardó con éxito
      $leccion = gruposModel::by_id($id);
      json_output(json_build(200, $leccion, 'grupo actualizada con éxito.'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function delete_grupo()
  {
    try {
      $id_grupo = clean($_POST['id']);

      // Validar que exista la presentación
      if (!$grupo = gruposModel::by_id($id_grupo)) {
        throw new Exception('No existe el grupo en la base de datos.');
      }

      if (!gruposModel::remove(gruposModel::$t1, ['id_grupo' => $id_grupo], 1)) {
        json_output(json_build(400, null, 'Hubo un error al borrar el grupo.'));
      }

      json_output(json_build(200, null, 'grupo borrada con éxito.'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function getSelect_grupo()
  {
    try {
      /* debug(productosModel::all_paginated());
      die; */
      $data = get_module('selectGrupos', gruposModel::all());
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  /**
   * PRINCIPIOS ACTIVO
   */

  function get_activePrinciples()
  {
    try {
      /* debug(productosModel::all_paginated());
      die; */
      $data = get_module('listaPrincipiosActivo', principioactivoModel::all_paginated());
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  function add_activePrinciple_form()
  {
    try {
      $nombre = clean($_POST['nombre_activePrinciple']);

      /* if(strlen($nombre) < 2){
        json_output(json_build(400, null, 'El nombre es corto'));
      } */
      $data =
        [
          'nombre_principioActivo' => $nombre,
          'dateCreation'        => now(),
          'dateUpdate'          => now()
        ];
      if (!$id = principioactivoModel::add(principioactivoModel::$t1, $data)) {
        json_output(json_build(400, null, 'Hubo error al guardar el registro'));
      }

      // se guardó con éxito
      $grupos = principioactivoModel::by_id($id);
      json_output(json_build(201, $grupos, 'Guarda agregado con exito. '));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function get_activePrinciple_form()
  {
    try {
      $id = clean($_POST['id']);
      if (!$princioActivo = principioactivoModel::by_id($id)) {
        throw new PDOException('El principio activo no existe en la base de datos.');
      }

      json_output(json_build(200, $princioActivo));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function update_activePrinciple_form()
  {
    try {
      $id          = (int) $_POST['id']; // id lección
      $nombre_princioActivo      = clean($_POST['nombre_activePrinciple']);
      $data =
        [
          'nombre_principioActivo'      => $nombre_princioActivo,
        ];

      if (!principioactivoModel::update(principioactivoModel::$t1, ['id_principioActivo' => $id], $data)) {
        json_output(json_build(400, null, 'Hubo un error al actualizar el principio activo.'));
      }

      // se guardó con éxito
      $princioActivo = principioactivoModel::by_id($id);
      json_output(json_build(200, $princioActivo, 'principio activo actualizada con éxito.'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function delete_activePrinciple()
  {
    try {
      $id_principioActivo = clean($_POST['id']);

      // Validar que exista la presentación
      if (!$princioActivo = principioactivoModel::by_id($id_principioActivo)) {
        throw new Exception('No existe la principio activo en la base de datos.');
      }

      if (!principioactivoModel::remove(principioactivoModel::$t1, ['id_principioActivo' => $id_principioActivo], 1)) {
        json_output(json_build(400, null, 'Hubo un error al borrar la principio activo.'));
      }

      json_output(json_build(200, null, 'principio activo borrada con éxito.'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function getSelect_activePrinciple()
  {
    try {
      /* debug(productosModel::all_paginated());
      die; */
      $data = get_module('selectPrincipiosActivo', principioactivoModel::all());
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  /**
   * INDICACIONES
   */
  function get_indications()
  {
    try {
      /* debug(productosModel::all_paginated());
      die; */
      $data = get_module('listaIndicaciones', indicacionesModel::all_paginated());
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  function add_indication_form()
  {
    try {
      $nombre = clean($_POST['nombre_indication']);

      /* if(strlen($nombre) < 2){
        json_output(json_build(400, null, 'El nombre es corto'));
      } */
      $data =
        [
          'nombre_indicacion' => $nombre,
          'dateCreation'        => now(),
          'dateUpdate'          => now()
        ];
      if (!$id = indicacionesModel::add(indicacionesModel::$t1, $data)) {
        json_output(json_build(400, null, 'Hubo error al guardar el registro'));
      }

      // se guardó con éxito
      $indicaciones = indicacionesModel::by_id($id);
      json_output(json_build(201, $indicaciones, 'Guarda agregado con exito. '));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function get_indication_form()
  {
    try {
      $id = clean($_POST['id']);
      if (!$princioActivo = indicacionesModel::by_id($id)) {
        throw new PDOException('La indicación no existe en la base de datos.');
      }

      json_output(json_build(200, $princioActivo));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function update_indication_form()
  {
    try {
      $id          = (int) $_POST['id']; // id lección
      $nombre_indication      = clean($_POST['nombre_indication']);
      $data =
        [
          'nombre_indicacion'      => $nombre_indication,
        ];

      if (!indicacionesModel::update(indicacionesModel::$t1, ['id_indicacion' => $id], $data)) {
        json_output(json_build(400, null, 'Hubo un error al actualizar la indicación.'));
      }

      // se guardó con éxito
      $indicacion = indicacionesModel::by_id($id);
      json_output(json_build(200, $indicacion, 'indicación actualizada con éxito.'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function delete_indication()
  {
    try {
      $id_indicacion = clean($_POST['id']);

      // Validar que exista la presentación
      if (!$indicacion = indicacionesModel::by_id($id_indicacion)) {
        throw new Exception('No existe la indicación en la base de datos.');
      }

      if (!indicacionesModel::remove(indicacionesModel::$t1, ['id_indicacion' => $id_indicacion], 1)) {
        json_output(json_build(400, null, 'Hubo un error al borrar la indicación.'));
      }

      json_output(json_build(200, null, 'indicación borrada con éxito.'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function getSelect_indication()
  {
    try {
      /* debug(productosModel::all_paginated());
      die; */
      $data = get_module('selectIndicaciones', indicacionesModel::all());
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }
  /**
   * PRODUCTOS
   */
  function add_product_form()
  {
    try {
      $codigoBarra = clean($_POST['barCode_product']);
      $nombre = clean($_POST['name_product']);      
      $presentacion_id = clean($_POST['presentation_id']);
      $laboratorio_id = clean($_POST['laboratory_id']);
      $grupo_id = clean($_POST['group_id']);
      $principioActivo_id = clean($_POST['activePrinciple_id']);
      $indicacion_id = clean($_POST['indication_id']);
      $concentracion = clean($_POST['concentration-product']);
      

      /* if(strlen($nombre) < 2){
        json_output(json_build(400, null, 'El nombre es corto'));
      } */
      $data =
        [
          'codigoBarras_producto'  => $codigoBarra,
          'nombre_producto'  => $nombre,
          'presentacion_id'  => $presentacion_id,
          'laboratorio_id'  => $laboratorio_id,
          'grupo_id'  => $grupo_id,
          'principioActivo_id'  => $principioActivo_id,
          'indicacion_id'  => $indicacion_id,
          'concentracion_producto'  => $concentracion,
          'dateCreation'  => now(),
          'dateUpdate'          => now()
        ];
      if (!$id = productosModel::add(productosModel::$t1, $data)) {
        json_output(json_build(400, null, 'Hubo error al guardar el registro'));
      }

      // se guardó con éxito
      $productos = productosModel::by_id($id);
      json_output(json_build(201, $productos, 'Producto agregado con exito. '));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function get_products()
  {
    try {
      /* debug(productosModel::all_paginated());
      die; */
      $data = get_module('listaProductos', productosModel::all_paginated());
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  function get_product_form()
  {
    try {
      $id = clean($_POST['id']);
      if (!$producto = productosModel::by_id($id)) {
        throw new PDOException('El Laboratorio no existe en la base de datos.');
      }

      json_output(json_build(200, $producto));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function update_product_form()
  {
    try {
      $id          = (int) $_POST['id']; // id lección
      $barCode_product      = clean($_POST['barCode_product']);
      $nombre_product      = clean($_POST['nombre_product']);
      $concentration_product      = clean($_POST['concentration_product']);
      $data =
        [
          'codigoBarras_producto'      => $barCode_product,
          'nombre_producto'      => $nombre_product,
          'concentracion_producto'      => $concentration_product,
        ];

      if (!productosModel::update(productosModel::$t1, ['id_producto' => $id], $data)) {
        json_output(json_build(400, null, 'Hubo un error al actualizar la indicación.'));
      }

      // se guardó con éxito
      $producto = productosModel::by_id($id);
      json_output(json_build(200, $producto, 'producto actualizada con éxito.'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function delete_product()
  {
    try {
      $id_producto = clean($_POST['id']);

      // Validar que exista la presentación
      if (!$producto = productosModel::by_id($id_producto)) {
        throw new Exception('No existe la indicación en la base de datos.');
      }

      if (!productosModel::remove(productosModel::$t1, ['id_producto' => $id_producto], 1)) {
        json_output(json_build(400, null, 'Hubo un error al borrar la indicación.'));
      }

      json_output(json_build(200, null, 'indicación borrada con éxito.'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function bee_get_movements()
  {
    try {
      $movements          = new movementModel;
      $movs               = $movements->all_by_date();

      $taxes              = (float) get_option('taxes') < 0 ? 16 : get_option('taxes');
      $use_taxes          = get_option('use_taxes') === 'Si' ? true : false;

      $total_movements    = $movs[0]['total'];
      $total              = $movs[0]['total_incomes'] - $movs[0]['total_expenses'];
      $subtotal           = $use_taxes ? $total / (1.0 + ($taxes / 100)) : $total;
      $taxes              = $subtotal * ($taxes / 100);

      $calculations       = [
        'total_movements' => $total_movements,
        'subtotal'        => $subtotal,
        'taxes'           => $taxes,
        'total'           => $total
      ];

      $data = get_module('movements', ['movements' => $movs, 'cal' => $calculations]);
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  function bee_delete_movement()
  {
    try {
      $mov     = new movementModel();
      $mov->id = $_POST['id'];

      if (!$mov->delete()) {
        json_output(json_build(400, null, 'Hubo error al borrar el registro'));
      }

      json_output(json_build(200, null, 'Movimiento borrado con éxito'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function bee_update_movement()
  {
    try {
      $movement     = new movementModel;
      $movement->id = $_POST['id'];
      $mov          = $movement->one();

      if (!$mov) {
        json_output(json_build(400, null, 'No existe el movimiento'));
      }

      $data = get_module('updateForm', $mov);
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  function bee_save_movement()
  {
    try {
      $mov              = new movementModel();
      $mov->id          = $_POST['id'];
      $mov->type        = $_POST['type'];
      $mov->description = $_POST['description'];
      $mov->amount      = (float) $_POST['amount'];
      if (!$mov->update()) {
        json_output(json_build(400, null, 'Hubo error al guardar los cambios'));
      }

      // se guardó con éxito
      json_output(json_build(200, $mov->one(), 'Movimiento actualizado con éxito'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function bee_save_options()
  {
    $options =
      [
        'use_taxes' => $_POST['use_taxes'],
        'taxes'     => (float) $_POST['taxes'],
        'coin'      => $_POST['coin']
      ];

    foreach ($options as $k => $option) {
      try {
        if (!$id = optionModel::save($k, $option)) {
          json_output(json_build(400, null, sprintf('Hubo error al guardar la opción %s', $k)));
        }
      } catch (Exception $e) {
        json_output(json_build(400, null, $e->getMessage()));
      }
    }

    // se guardó con éxito
    json_output(json_build(200, null, 'Opciones actualizadas con éxito'));
  }
}
