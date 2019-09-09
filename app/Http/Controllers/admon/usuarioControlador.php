<?php

namespace App\Http\Controllers\admon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\tipos_documentos;
use App\roles;
use App\User;
use App\usuarios_roles;
use Validator;
use App\areas_formacion;
use App\usuario_areas;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\usuarioCreado;
use App\Mail\codigoUsuario;
use App\vistaUsuarioRoles;

class usuarioControlador extends Controller
{
    public function crearUsuario()
    {
       /*$data = array('name'=>"Virat Gandhi");
      Mail::send(['text'=>'correo.usuarioCreado'], $data, function($message) {
         $message->to('wramirez@misena.edu.co', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('wilson.rz@gmail.com','Virat Gandhi');
      });*/

      $tipos_documento = new tipos_documentos();
      $_data['tipos'] = $tipos_documento->all();

      $roles = new roles();
      $areas_formacion = new areas_formacion();
     
      $_data['roles'] = $roles->all();
      $_data['areas_formacion'] = $areas_formacion->all();

      return view('usuarios.crearUsuarios', $_data);
    }
    public function guardarUsuario(Request $resquest)
    {
      $validar = Validator::make($resquest->all(),[
        'tipo_documento' => 'required',
        'correo' => 'required|email',
        'nombre_usuario' => 'required',
        'clave' => 'required',
        'documento' => 'required|numeric'
        ]);
      if($validar->fails())
      {
        return back()->withInput()->withErrors($validar);
      }

      $usuario = new User();
      $existe = $usuario->where('documento', $resquest->documento)->orWhere('correo', $resquest->correo)->first();
      if(!isset($existe->correo))
      {
        $usuario = new User();
        $res = $resquest->all();
        $usuario->id_tipo_documento = $resquest->tipo_documento;
        $usuario->correo = $resquest->correo;
        $usuario->nombre_usuario = $resquest->nombre_usuario;
        $usuario->clave = bcrypt($resquest->clave);
        $usuario->documento = $resquest->documento;
        $usuario->save();
        $id_usuario = $usuario->id_usuario;

        //$_campos = array_slice($resquest->all(), 6);
        $_campos = $resquest->all();
        foreach ($_campos as $key => $value)
        {
          //echo $key . "-";
          $_llaveRol = substr($key, 0, 6);
          if($_llaveRol == "id_rol")
          {
            $usuario_roles = new usuarios_roles();
            $usuario_roles->id_usuario = $id_usuario;
            $usuario_roles->id_rol = $value;
            $usuario_roles->save();
          }
          $_llaveArea = substr($key, 0, 7);
          if($_llaveArea == "id_area")
          {
            $usuarios_area = new usuario_areas();
            $usuarios_area->id_area = $value;
            $usuarios_area->id_usuario = $id_usuario;
            $usuarios_area->save();
          }
        }
        $call = array('nombre' => $resquest->nombre_usuario,
                      'correo' =>  $resquest->correo,
                      'clave' => $resquest->clave,
                      'documento' => $resquest->documento);
        $destino = array($resquest->correo, Auth::user()->correo);
        Mail::to($destino)->send(new usuarioCreado($call));
        return  redirect()->route('crearUsuario')->with('status', 'ok');
      }
      else {
        return  redirect()->route('crearUsuario')->with('status', 'noOk');
      }

    }

    public function modificarUsuario()
    {
      return view('usuarios.modificarUsuarios');
    }
    public function buscarUsuario(Request $resquest)
    {
      $usuario = new User();
      $_data;
      $_filtro;
      if($resquest->nombre_usuario == "" && $resquest->correo == "" && $resquest->documento == "")
      {
        $_data = $usuario->all();
      }
      else
      {
        if($resquest->documento != "")
        {
         $_filtro[] = ['documento', '=' , $resquest->documento];
        }
        if($resquest->nombre_usuario != "")
        {
           $_filtro[] = ['nombre_usuario', 'LIKE', '%'. $resquest->nombre_usuario . '%'];
        }
         if($resquest->correo != "")
        {
           $_filtro[] = ['correo', 'LIKE',  '%' . $resquest->correo . '%'];
        }
         $_data = $usuario->where($_filtro)->get();
      }
      return back()->with('datos', $_data);

    }
    public function formularioClave()
    {
     return view('usuarios.formularioClave'); 
    }
    public function cambiarClave(Request $resquest)
    {
      $usuario = new User();
      $_codigo = rand(1000, 9999);
      $_data = $usuario->Where('correo', $resquest->correo)->update(['remember_token' => $_codigo]);
      if($_data > 0)
      {
        $cambio = "Hemos enviado un Código a su CORREO electrónico";
        Mail::to($resquest->correo)->send(new codigoUsuario($_codigo));
      }
      return view('usuarios.formularioClave',['datos' => $cambio]);

    }
    public function actualizarClave(Request $resquest)
    {
      $usuario = new User();
      $_data = $usuario->Where('correo', $resquest->correo)->where('remember_token', $resquest->remember_token)->update(['clave' => bcrypt($resquest->clave)]);
      return redirect('/');
    }
    public function buscarFuncionario()
    {
      $_cadena = "";
      if(isset($_POST['nombre']) && $_POST['nombre'] != "")
      {
        $_cadena .= "nombre_usuario LIKE  '%" . $_POST['nombre'] . "%' AND ";  
      }
       if(isset($_POST['documento']) && $_POST['documento'] != "")
      {
        $_cadena .= " documento=" . $_POST['documento']. ' AND ';  
      }
      $_cadena = substr($_cadena, 0, strlen($_cadena)-4);
      $usuario = DB::select('SELECT * FROM usuarios WHERE ' . $_cadena);
      echo json_encode($usuario);
    }
    public function actualizarUsuario(Request $res)
    {
      $tipos_documento = new tipos_documentos();
      $_data['tipos'] = $tipos_documento->all();
      $roles = new roles();
      $areas_formacion = new areas_formacion();
      $_data['roles'] = $roles->all();
      $_data['areas_formacion'] = $areas_formacion->all();
      $_data['usuario'] =  User::find($res->idUsuario);
      //Consulta roles Asignados
      $_rolesUsuario = json_encode(vistaUsuarioRoles::where('id_usuario', $res->idUsuario)->pluck('id_rol'));
      $_data['rolesUsuario'] = $_rolesUsuario;
      $usuario_areas = new usuario_areas();
      $areas_formacionUsuario = json_encode($usuario_areas::where('id_usuario', $res->idUsuario)->pluck('id_area'));
      $_data['areas_formacionUsuario'] = $areas_formacionUsuario;
      return view('usuarios.actualizarUsuario', $_data);
    }
    public function actualizando(Request $resquest)
    {
      $validar = Validator::make($resquest->all(),[
        'id_usuario' => 'required',
        'tipo_documento' => 'required',
        'correo' => 'required|email',
        'nombre_usuario' => 'required',
        'documento' => 'required|numeric'
        ]);
      if($validar->fails())
      {
        return back()->withInput()->withErrors($validar);
      }

      $usuario = new User();
      $existe = $usuario->where('documento', $resquest->documento)->where('correo', $resquest->correo)->first();
      if(isset($existe->correo))
      {
        $usuario = User::find($resquest->id_usuario);
        $res = $resquest->all();
        $usuario->id_tipo_documento = $resquest->tipo_documento;
        $usuario->correo = $resquest->correo;
        $usuario->nombre_usuario = $resquest->nombre_usuario;
        if($resquest->clave !="")
        {
          $usuario->clave = bcrypt($resquest->clave);
        }
        $usuario->documento = $resquest->documento;
        $usuario->save();
        $id_usuario = $usuario->id_usuario;

        //Borrar datos
        usuarios_roles::where('id_usuario', $resquest->id_usuario)->delete();
        usuario_areas::where('id_usuario', $resquest->id_usuario)->delete();
        //$_campos = array_slice($resquest->all(), 6);
        $_campos = $resquest->all();
        foreach ($_campos as $key => $value)
        {
          //echo $key . "-";
          $_llaveRol = substr($key, 0, 6);
          if($_llaveRol == "id_rol")
          {
            $usuario_roles = new usuarios_roles();
            $usuario_roles->id_usuario = $id_usuario;
            $usuario_roles->id_rol = $value;
            $usuario_roles->save();
          }
          $_llaveArea = substr($key, 0, 7);
          if($_llaveArea == "id_area")
          {
            $usuarios_area = new usuario_areas();
            $usuarios_area->id_area = $value;
            $usuarios_area->id_usuario = $id_usuario;
            $usuarios_area->save();
          }
        }
       // $call = array('nombre' => $resquest->nombre_usuario,
                  //    'correo' =>  $resquest->correo,
                     // 'clave' => $resquest->clave,
                      //'documento' => $resquest->documento);
       // $destino = array($resquest->correo, Auth::user()->correo);
        //Mail::to($destino)->send(new usuarioCreado($call));
        return  redirect()->route('modificarUsuario')->with('status', 'ok');
      }
      else {
        return  redirect()->route('modificarUsuario')->with('status', 'noOk');
      }

    }
}
