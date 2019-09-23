<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class historialEstadosModelo extends Model
{
    protected $table = "historialestados";
    protected $primaryKey = 'idHistorialEstados';
    protected $fillable = ['idHistorialEstados','idEstadoAnterior', 'idEstadoNuevo', 'idUsuario', 'idSolicitud', 'observacion'];
}
