<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\usuarios_roles;
use App\roles;


class iniciarControlador extends Controller
{
  public function index(Request $res)
  {
    if($res->correo != "")
    {
      $_credenciales = $res->only('correo', 'clave');
      if(Auth::attempt($_credenciales))
      {
        $roles = new usuarios_roles();
        $a = $roles->where('id_usuario' , Auth::user()->id_usuario)->get();
        $listaRoles = new roles();
        $list = $this->verRoles($listaRoles->get());
        $a = $this->crearRoles($a, $list);
        setcookie('roles', json_encode($a));
        return redirect()->route('dashboard');
      }
      else
      {
        return back()->withInput()->with('error', 'error');
      }
    }
    else {
      return redirect('/');
    }

  }
  public function salir()
  {
    Auth::logout();
    return redirect('/');
  }
  public function crearRoles($a, $b)
  {
    $i = 0;
    

    foreach ($a as $key)
    {
      $_dato[$i]['id'] = $key->id_rol;
      $_dato[$i]['nombre'] = $b[$key->id_rol];
      $i++;
    }
    return $_dato;
  }
  public function verRoles($a)
  {
    $_dato;
    foreach ($a as $key) {
      $_dato[$key->id_rol]['rol'] = $key->nombre_rol;
    }
    return $_dato;
  }

}
