<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class solicitud extends Model
{
  protected $table = 'solicitudes';
  protected $primaryKey = 'id_solicitud';
  protected $fillable = [
      'id_solicitud', 'id_estado', 'id_usuario', 'id_ficha', 'fecha', 'id_area_formacion'
  ];


}
