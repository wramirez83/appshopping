<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class areas_formacion extends Model
{
  protected $table = 'areas_formacion';
  protected $primaryKey = 'id_area';
  protected $fillable = [
      'id_area', 'nombre_area'
  ];
}
