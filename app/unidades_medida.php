<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class unidades_medida extends Model
{
    protected $table = 'unidades_medida';
  	//protected $primaryKey = 'unidad_medida';
  	protected $fillable = [
      'unidad_medida', 'descripcion'
  ];
}
