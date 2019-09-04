<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id_rol';
    protected $fillable = [
        'id_rol', 'nombre_rol'
    ];
}
