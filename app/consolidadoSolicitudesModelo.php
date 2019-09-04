<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class consolidadoSolicitudesModelo extends Model
{
    protected $table = 'consolidadosolicitudes';
    protected $primaryKey = 'id_solicitud';
    protected $fillable = ['id_solicitud', 'id_estado', 'fecha', 'id_ficha', 'id_proyecto_formativo', 'ficha', 'estad_ficha', 'documento', 'nombre_usuario', 'nombre_area'];
}
