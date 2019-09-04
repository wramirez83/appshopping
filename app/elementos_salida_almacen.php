<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class elementos_salida_almacen extends Model
{
    protected $table = 'elementos_salida_almacen';
  	protected $primaryKey = 'id_elemento_salida';
  	protected $fillable = [
      'id_elemento_salida', 'id_salida_alamcen', 'id_producto', 'cantidad'
  ];
}
