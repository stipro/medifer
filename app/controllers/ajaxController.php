<?php 

class ajaxController extends Controller {
  
  private $accepted_actions = ['get', 'post', 'put', 'delete', 'options', 'add', 'load'];
  private $required_params  = ['hook', 'action'];

  function __construct()
  {
    foreach ($this->required_params as $param) {
      if(!isset($_POST[$param])) {
        json_output(json_build(403));
      }
    }

    if(!in_array($_POST['action'], $this->accepted_actions)) {
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
      if(!$id = presentacionesModel::add(presentacionesModel::$t1, $data)) {
        json_output(json_build(400, null, 'Hubo error al guardar el registro'));
      }
  
      // se guardó con éxito
      $presentaciones = presentacionesModel::by_id($id);
      json_output(json_build(201, $presentaciones,'Presentacion agregado con exito. '));
      
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

    } catch(Exception $e) {
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

      if(!presentacionesModel::update(presentacionesModel::$t1, ['id_presentacion' => $id], $data)) {
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

  function get_selectPresentaciones()
  {
    try {
        /* debug(productosModel::all_paginated());
      die; */
      $data = get_module('selectPresentaciones', presentacionesModel::all());
      json_output(json_build(200, $data));

    } catch(Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  function delete_presentacion()
  {
    try {
      $id_presentacion = clean($_POST['id']);

      // Validar que exista la presentación
      if (!$leccion = presentacionesModel::by_id($id_presentacion)) {
        throw new Exception('No existe la presentación en la base de datos.');
      }

      if(!presentacionesModel::remove(presentacionesModel::$t1, ['id_presentacion' => $id_presentacion], 1)) {
        json_output(json_build(400, null, 'Hubo un error al borrar la presentación.'));
      }

      json_output(json_build(200, null, 'presentación borrada con éxito.'));
      
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function get_laboratorios()
  {
    try {
        /* debug(productosModel::all_paginated());
      die; */
      $data = get_module('listaLaboratorios', laboratoriosModel::all_paginated());
      json_output(json_build(200, $data));

    } catch(Exception $e) {
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
      if(!$id = laboratoriosModel::add(laboratoriosModel::$t1, $data)) {
        json_output(json_build(400, null, 'Hubo error al guardar el registro'));
      }
  
      // se guardó con éxito
      $laboratorios = laboratoriosModel::by_id($id);
      json_output(json_build(201, $laboratorios,'Laboratorio agregado con exito. '));
      
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

  function add_product_form()
  {
    try {
      $nombre = clean($_POST['nombre_producto']);

      /* if(strlen($nombre) < 2){
        json_output(json_build(400, null, 'El nombre es corto'));
      } */
      $data = 
      [
        'nombre_producto'  => $nombre
      ];
      if(!$id = productosModel::add(productosModel::$t1, $data)) {
        json_output(json_build(400, null, 'Hubo error al guardar el registro'));
      }
  
      // se guardó con éxito
      $productos = productosModel::by_id($id);
      json_output(json_build(201, $productos,'Producto agregado con exito. '));
      
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
    } catch(Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }

  }

  function bee_delete_movement()
  {
    try {
      $mov     = new movementModel();
      $mov->id = $_POST['id'];

      if(!$mov->delete()) {
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

      if(!$mov) {
        json_output(json_build(400, null, 'No existe el movimiento'));
      }

      $data = get_module('updateForm', $mov);
      json_output(json_build(200, $data));
    } catch(Exception $e) {
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
      if(!$mov->update()) {
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
        if(!$id = optionModel::save($k, $option)) {
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