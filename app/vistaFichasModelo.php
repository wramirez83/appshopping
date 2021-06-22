<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vistaFichasModelo extends Model
{
	protected $table = 'vistafichas';
	protected $primaryKey = 'id_ficha';
	protected $fillable = [ 'id_ficha', 'ficha', 'estadoFicha',
	'id_proyecto_formativo', 'nombre_proyecto', 'codigoProyecto', 'id_programa', 'nombre_programa',
	'codigo', 'version', 'estado'
];
}
