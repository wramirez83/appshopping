<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vistaExistenciaModelo extends Model
{
    protected $table = 'vistaexistencia';
    protected $primaryKey = 'id_codigo_producto';
    protected $fillable = ['id_codigo_producto', 'nombre', 'entradaElemento', 'salidaElemento'];
}
