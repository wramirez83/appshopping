<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salidas_almacen extends Model
{
    protected $table = 'salidas_almacen';
  protected $primaryKey = 'id_salida_almacen';
  protected $fillable = [
      'id_salida_almacen', 'id_usuario', 'id_usuario_recibe', 'fecha'
  ];
}
