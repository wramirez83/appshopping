<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class areas extends Model
{
  protected $table = 'areas';
  protected $primaryKey = 'id_area';
  protected $fillable = [
      'id_area', 'nombre_area'
  ];
}
