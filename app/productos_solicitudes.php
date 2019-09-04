<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos_solicitudes extends Model
{
    protected $table = 'productos_solicitudes';
    protected $primaryKey = 'id_productos_solicitudes';
    protected $fillable = [
        'id_productos_solicitudes', 'solicitudes_id_solicitud',
        'productos_id_codigo_producto', 'precio', 'cantidad', 'observaciones'
    ];
}
