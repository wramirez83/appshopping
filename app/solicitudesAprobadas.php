<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class solicitudesAprobadas extends Model
{
  protected $table = 'solicitudesaprobadas';
  protected $fillable = [
      'cantidad', 'nombre', 'detalles_productos', 'unidad_medida', 'codigos_unspcs','precio', 'total', 'nombre_area', 'fecha'
  ];
}
