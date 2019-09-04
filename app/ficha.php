<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ficha extends Model
{
  protected $table = 'fichas';
  protected $primaryKey = 'id_ficha';
  protected $fillable = [
      'id_proyecto_formativo', 'ficha', 'estado'
  ];
}
