<?php

/**
 * Plantilla general de controladores
 * Versión 1.0.2
 *
 * Controlador de presentaciones
 */
class presentacionesController extends Controller {
  function __construct()
  {
    // Validación de sesión de usuario, descomentar si requerida
    if (!Auth::validate()) {
      Flasher::new('Debes iniciar sesión primero.', 'danger');
      Redirect::to('login');
    }
  }
  
  function index()
  {
   /*  debug(presentacionesModel::all_paginated());
    die; */
    $data = 
    [
      'title' => 'Presentaciones',
      // Enviando informacion a la vista
      'presentaciones' => presentacionesModel::all_paginated(),
      'msg'   => 'Bienvenido al controlador de "presentaciones", se ha creado con éxito si ves este mensaje.',
      'padding' => '0px'
    ];
    
    // Descomentar vista si requerida
    View::render('index', $data);
  }

  function ver($id)
  {
    View::render('ver');
  }

  function agregar()
  {
    try {
      $data =
      [
        'nombre'   => 'productTest'
      ];
      if (!$id = presentacionesModel::add(presentacionesModel::$t1, $data))
      {
        throw new PDOException('Hubo un problema al guardar registro.');
      }
    }
    catch (PDOException $e) {
      Flasher::new($e->getMessage(), 'danger');
      Redirect::to('presentaciones');
    }
    View::render('agregar');
  }

  function post_agregar()
  {

  }

  function editar($id)
  {
    View::render('editar');
  }

  function post_editar()
  {

  }

  function borrar($id)
  {
    // Proceso de borrado
  }
}