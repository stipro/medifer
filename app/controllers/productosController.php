<?php

/**
 * Plantilla general de controladores
 * Versión 1.0.2
 *
 * Controlador de productos
 */
class productosController extends Controller {
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
    /* var_dump($_SESSION); */
    /* debug(Auth::validate());
    die; */
    $data = 
    [
      'title' => 'Productos',
      'productos' => productosModel::all_paginated(),
      'presentaciones' => productosModel::all_paginated(),
      'msg'   => 'Bienvenido al controlador de "productos", se ha creado con éxito si ves este mensaje.',
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
      
      if (!$id = productosModel::add(productosModel::$t1, $data))
      {
        throw new PDOException('Hubo un problema al guardar registro.');
      }
    } catch (PDOException $e) 
    {
      Flasher::new($e->getMessage(), 'danger');
      Redirect::to('productos');
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