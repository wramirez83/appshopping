<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
  protected $table = 'productos';
  protected $primaryKey = 'id_codigo_producto';
  protected $fillable = [
      'id_codigo_producto', 'id_area', 'idUsuario', 'nombre', 'detalles_producto',
      'precio', 'unidad_medida', 'codigos_unspcs_id_codigo_unspcs',
      'estado_producto', 'foto', 'tipo_foto'
  ];
}
