<?php

/**
 * Plantilla general de modelos
 * Versión 1.0.1
 *
 * Modelo de principioactivo
 */
class principioactivoModel extends Model {
  public static $t1   = 'principioActivos'; // Nombre de la tabla en la base de datos;
  
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
    $sql = 'SELECT * FROM principioActivos ORDER BY id_principioActivo ASC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function all_paginated()
  {
    // Todos los registros
    $sql = 'SELECT * FROM principioActivos ORDER BY id_principioActivo ASC';
    return PaginationHandler::paginate($sql);
  }

  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT * FROM principioActivos WHERE id_principioActivo = :id LIMIT 1';
    return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : [];
  }
}

