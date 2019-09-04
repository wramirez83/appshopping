<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = [
        'id_usuario', 'correo', 'nombre', 'documento', 'nombre_usuario'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function getAuthPassword()
    {
        return $this->clave;
    }
    
}
