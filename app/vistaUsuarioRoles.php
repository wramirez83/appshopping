<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vistaUsuarioRoles extends Model
{
    protected $table = 'vistausuariosroles';
    protected $primaryKey = 'id_usuario';
    protected $fillable = [
        'id_usuario', 'correo', 'nombre', 'documento', 'nombre_usuario', 'id_rol'];
}
