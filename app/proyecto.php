<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyecto extends Model
{
  protected $table = 'proyecto_formativo';
  protected $primaryKey = 'id_proyecto_formativo';
  protected $fillable = [
      'nombre_proyecto', 'codigo', 'id_programa'
  ];
}
