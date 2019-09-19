<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class historialEstadosModelo extends Model
{
    protected $table = "historialestados";
    protected $primaryKey = 'idHistorialEstado';
    protected $fillable = ['idHistorialEstado','idEstadoAnterior', 'idEstadoNuevo', 'idUsuario', 'idSolicitud', 'observacion'];
}
