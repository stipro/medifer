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
  $select = array();
  $tipoPresentaciones = presentacionesModel::all();
  foreach ($tipoPresentaciones as $tpPresentaciones) {
    $item = [$tpPresentaciones['nombre_presentacion'], $tpPresentaciones['id_presentacion'], $tpPresentaciones['nombre_presentacion']];
    array_push($select, $item);
  }
  return $select;
}

function get_tipo_laboratorios()
{
  $select = array();
  $tipoLaboratorios = laboratoriosModel::all();
  foreach ($tipoLaboratorios as $tpLaboratorios) {
    $item = [$tpLaboratorios['nombre_laboratorio'], $tpLaboratorios['id_laboratorio'], $tpLaboratorios['nombre_laboratorio']];
    array_push($select, $item);
  }
  return $select;
}

function get_tipo_grupos()
{
  $select = array();
  $tipoGrupos = gruposModel::all();
  foreach ($tipoGrupos as $tpGrupos) {
    $item = [$tpGrupos['nombre_grupo'], $tpGrupos['id_grupo'], $tpGrupos['nombre_grupo']];
    array_push($select, $item);
  }
  return $select;
}

function get_tipo_princiosActivo()
{
  $select = array();
  $tipoIndicacionesActivo = principioactivoModel::all();
  foreach ($tipoIndicacionesActivo as $tpPrincipioActivo) {
    $item = [$tpPrincipioActivo['nombre_principioActivo'], $tpPrincipioActivo['id_principioActivo'], $tpPrincipioActivo['nombre_principioActivo']];
    array_push($select, $item);
  }
  return $select;
}

function get_tipo_indicaciones()
{
  $select = array();
  $tipoIndicaciones = indicacionesModel::all();
  foreach ($tipoIndicaciones as $tpIndicaciones) {
    $item = [$tpIndicaciones['nombre_indicacion'], $tpIndicaciones['id_indicacion'], $tpIndicaciones['nombre_indicacion']];
    array_push($select, $item);
  }
  return $select;
}

function get_tipo_productos()
{
  /*  debug(presentacionesModel::all_paginated());
    die; */
  $select = array();
  $tipoProductos = productosModel::all();
  foreach ($tipoProductos as $tpProductos) {
    $item = [$tpProductos['nombre_producto'], $tpProductos['id_producto'], $tpProductos['nombre_producto']];
    array_push($select, $item);
  }
  return $select;
}

function get_lista_presentaciones()
{
  /*  debug(presentacionesModel::all_paginated());
    die; */
  $select = array();
  $tipoProveedores = proveedoresModel::all();
  foreach ($tipoProveedores as $tpProveedores) {
    $item = [$tpProveedores['nombre_proveedor'], $tpProveedores['id_proveedor'], $tpProveedores['nombre_proveedor']];
    array_push($select, $item);
  }
  return $select;
}