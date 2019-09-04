<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario_areas extends Model
{
  protected $table = 'usuario_areas';
  protected $primaryKey = 'id_usuario_area';
  protected $fillable = [
      'id_usuario_area', 'id_usuario', 'id_area'
  ];
}
