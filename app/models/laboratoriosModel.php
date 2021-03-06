<?php

/**
 * Plantilla general de modelos
 * Versión 1.0.1
 *
 * Modelo de laboratorios
 */
class laboratoriosModel extends Model {
  public static $t1   = 'laboratorios'; // Nombre de la tabla en la base de datos;
  
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
    $sql = 'SELECT * FROM laboratorios ORDER BY id_laboratorio ASC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function all_paginated()
  {
    // Todos los registros
    $sql = 'SELECT * FROM laboratorios ORDER BY id_laboratorio ASC';
    return PaginationHandler::paginate($sql);
  }

  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT * FROM laboratorios WHERE id_laboratorio = :id LIMIT 1';
    return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : [];
  }
}

