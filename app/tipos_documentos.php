<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipos_documentos extends Model
{
  protected $table = 'tipos_documentos';
  protected $primaryKey = 'id_tipo_documento';
  protected $fillable = [
      'id_tipo_documento', 'tipo'
  ];
}
