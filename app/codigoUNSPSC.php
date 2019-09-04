<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class codigoUNSPSC extends Model
{
  protected $table = 'codigos_unspcs';
  protected $primaryKey = 'id_codigo_unspcs';
  protected $fillable = [
      'id_codigo_unspcs', 'descripcion', 'estado'
  ];
}
