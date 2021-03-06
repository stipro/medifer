<?php

/**
 * Plantilla general de modelos
 * Versión 1.0.1
 *
 * Modelo de productos
 */
class productosModel extends Model
{
  public static $t1   = 'productos'; // Nombre de la tabla en la base de datos;

  // Nombre de tabla 2 que talvez tenga conexión con registros
  //public static $t2 = '__tabla 2___'; 
  //public static $t3 = '__tabla 3___'; 

  function __construct()
  {
    // Constructor general
  }

  static function all()
  {
    // Todos los registros
    $sql = 'SELECT * FROM productos ORDER BY id_producto DESC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function all_paginated()
  {
    // Todos los registros
    $sql = 'SELECT
    pd.id_producto,
    pd.codigoBarras_producto,
    pd.nombre_producto,
    pd.concentracion_producto,
    pt.nombre_presentacion,
    lb.nombre_laboratorio,
		gp.nombre_grupo,
		pcAc.nombre_principioActivo,
		ic.nombre_indicacion
FROM
    productos AS pd
    LEFT JOIN presentaciones AS pt ON pd.presentacion_id = pt.id_presentacion
    LEFT JOIN laboratorios AS lb ON pd.laboratorio_id = lb.id_laboratorio
		LEFT JOIN grupos AS gp ON pd.grupo_id = gp.id_grupo
		LEFT JOIN principiosactivo AS pcAc ON pd.principioActivo_id = pcAc.id_principioActivo
		LEFT JOIN indicaciones AS ic ON pd.indicacion_id = ic.id_indicacion
ORDER BY
    id_producto DESC';
    return PaginationHandler::paginate($sql);
  }

  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT
      pd.id_producto,
      pd.codigoBarras_producto,
      pd.nombre_producto,
      pd.presentacion_id,
      pt.nombre_presentacion,
      pd.laboratorio_id,
      lb.nombre_laboratorio,
      pd.grupo_id,
      gp.nombre_grupo,
      pd.principioActivo_id,
      pcAc.nombre_principioActivo,
      pd.indicacion_id,
      ic.nombre_indicacion,
      pd.concentracion_producto
    FROM productos AS pd
      LEFT JOIN presentaciones AS pt ON pd.presentacion_id        = pt.id_presentacion
      LEFT JOIN laboratorios AS lb ON pd.laboratorio_id           = lb.id_laboratorio
      LEFT JOIN grupos AS gp ON pd.grupo_id                       = gp.id_grupo
      LEFT JOIN principiosactivo AS pcAc ON pd.principioActivo_id = pcAc.id_principioActivo
      LEFT JOIN indicaciones AS ic ON pd.indicacion_id            = ic.id_indicacion
    WHERE id_producto = :id LIMIT 1';
    return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : [];
  }
}
