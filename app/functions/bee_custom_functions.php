<?php 

/**
 * La primera función de pruebas del curso de creando el framework MVC
 *
 * @return void
 */
function en_custom() {
  return 'ESTOY DENTRO DE CUSTOM_FUNCTIONS.';
}

/**
 * Carga las diferentes divisas soporatadas en el proyecto de pruebas
 *
 * @return void
 */
function get_coins() {
  return 
  [
    'MXN',
    'USD',
    'CAD',
    'EUR',
    'ARS',
    'AUD',
    'JPY'
  ];
}

function get_tipo_presentaciones()
{
  /*  debug(presentacionesModel::all_paginated());
    die; */
  $prueba = array();
  $tipoPresentaciones = presentacionesModel::all();
  foreach ($tipoPresentaciones as $tpPresentaciones) {
    $item = [$tpPresentaciones['nombre_presentacion']   , $tpPresentaciones['nombre_presentacion']];
    array_push($prueba, $item);    
  }
  return $prueba;
}