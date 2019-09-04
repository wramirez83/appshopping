<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class programas extends Model
{
  protected $table = 'programas';
  protected $primaryKey = 'id_programa';
  protected $fillable = [
      'id_programa', 'nombre_programa', 'codigo', 'version', 'estado'
  ];
}
