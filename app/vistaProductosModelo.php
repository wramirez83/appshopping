<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vistaProductosModelo extends Model
{
    protected $table = 'vistaproductos';
  protected $primaryKey = 'id_codigo_producto';
  protected $fillable = [ 'nombre_area', 'descripcionUnspcs', 'codigoUnspcs',
      'id_producto', 'id_area', 'idUsuario', 'nombre', 'detalles_producto',
      'precio', 'unidad_medida', 'codigos_unspcs_id_codigo_unspcs',
      'estado_producto', 'foto', 'tipo_foto'
  ];
}
