<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class elementos_entradas_almacen extends Model
{
   	protected $table = 'elementos_entradas_almacen';
  	protected $primaryKey = 'id_elemento_entrada';
  	protected $fillable = [
      'id_elemento_entrada', 'id_entrada_almacen', 'id_producto', 'cantidad'
  ];
}
