<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class entradas_almacen extends Model
{
   	protected $table = 'entradas_almacen';
  	protected $primaryKey = 'id_entrada_almacen';
  	protected $fillable = [
      'id_entrada_almacen', 'id_usuario', 'fecha', 'fecha_ingreso', 'factura'
  ];
}
