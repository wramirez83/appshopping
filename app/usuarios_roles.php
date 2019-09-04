<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarios_roles extends Model
{
  protected $table = 'usuarios_roles';
  protected $primaryKey = 'id_usuario_rol';
  protected $fillable = [
      'id_usuario_rol', 'id_usuario', 'id_rol'
  ];
}
