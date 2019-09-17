<?php

namespace App\Http\Controllers\admon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ficha;
use App\vistaFichasModelo;
use App\areas;
use App\solicitud;
use App\productos_solicitudes;
use App\areas_formacion;
use Auth;
use App\Http\Controllers\admon\productosSolicitudControlador;
use Illuminate\Support\Facades\DB;
use App\roles;
use App\Mail\solicitudGuardada;
use App\Mail\solicitudNoAprobada;
use App\Mail\solicitudAprobada;
use Mail;
use App\vistaUsuarioRoles;

class solicitudControlador extends Controller
{
    public function index()
    {
      $_ficha = new vistaFichasModelo();
      $_area = new areas();
      
      $area_formacion = DB::select('SELECT * FROM usuario_areas, areas_formacion WHERE usuario_areas.id_usuario = ' . Auth::user()->id_usuario . ' AND areas_formacion.id_area = usuario_areas.id_area');
      return view('solicitud.crearSolicitud', ['ficha' => $_ficha->where('estado', 'Activo')->get(), 'area' => $_area->all(), 'area_formacion' => $_area->all()]);
    }
    public function guardarSolicitud(Request $resquest)
    {
      
      if(isset($resquest->id_estado))
      {
        $estado = $resquest->id_estado;
        $_estado_correo = 'GUARDADA Y ENVIADA';
        $_destino = DB::select('SELECT usuarios.correo FROM usuarios_roles, usuarios WHERE usuarios_roles.id_rol = 3 AND usuarios.id_usuario = usuarios_roles.id_usuario');
        $_destino = $this->destinoCorreo(3);
        $_destino[] = Auth::user()->correo;
      }
      else
      {
        $estado = 1;
        $_estado_correo = 'GUARDADA EN PROCESO';
        $_destino[] = Auth::user()->correo;
      }
      $_solicitud = new solicitud();
      $_solicitud->id_estado = $estado;
      $_solicitud->id_usuario = Auth::user()->id_usuario;
      $_solicitud->id_ficha = $resquest->id_ficha_JS;
      $_solicitud->id_area_formacion = $resquest->id_area_formacionJS;
      $_solicitud->save();
      $id_solicitud = $_solicitud->id_solicitud;
      $_productos = json_decode($resquest->productosJS);
      foreach ($_productos as $llaveP)
      {
        $p = new productosSolicitudControlador();
        $p->guardarProductoSolicitud($id_solicitud, $llaveP[0], $llaveP[1], $llaveP[2]);
      }
      //******+ENVIO de correo *****
      $call = array('estado' => $_estado_correo,
                      'solicitud' =>  $id_solicitud,
                      'fecha' => date("Y-m-d H:i:s")
                    );
        Mail::to($_destino)->send(new solicitudGuardada($call));
      //******FIN CORREO************
      return back()->with('status', 'Su Codigo de Solicitud es: ' .  $id_solicitud);
    }
    public function listarSolicitud()
    {

      $idUsuario = Auth::user()->id_usuario;
      $d = DB::select('SELECT solicitudes.id_solicitud, estados.nombre_estado, estados.id_estado, fichas.ficha, fichas.id_ficha, fichas.id_proyecto_formativo, solicitudes.fecha FROM solicitudes, estados, fichas WHERE solicitudes.id_usuario = ' . $idUsuario . ' AND estados.id_estado = solicitudes.id_estado AND fichas.id_ficha = solicitudes.id_ficha');
      return view('solicitud.listarSolicitud', ['solicitudes' => $d]);
    }
    public function listaSolicitud(Request $resquest)
    {
      //Verificamos que este en el estado correcto
      $_solicitud = new solicitud();
       
      $_verifica = $_solicitud->where('id_solicitud', $resquest->id_solicitud)->where('id_estado', 1)->first();
      $_productos = new productos_solicitudes();
      $_area = new areas();
      if(isset($_verifica->id_solicitud) && $_verifica->id_solicitud > 0)
      {
        //$_productos->where('solicitudes_id_solicitud', $resquest->id_solicitud)->get(), 'area' => $_area->all()
        $_productosSolicitud = DB::select('SELECT productos_solicitudes.*, productos.nombre FROM productos_solicitudes, productos WHERE productos_solicitudes.solicitudes_id_solicitud = ' . $resquest->id_solicitud . ' AND productos.id_codigo_producto = productos_solicitudes.productos_id_codigo_producto');
        return view('solicitud.listaSolicitud', ['solicitud' => $_verifica,
        'productos' => $_productosSolicitud, 'area' => $_area->all()]);
      }
      else {
        $_productosSolicitud = DB::select('SELECT productos_solicitudes.*, productos.nombre FROM productos_solicitudes, productos WHERE productos_solicitudes.solicitudes_id_solicitud = ' . $resquest->id_solicitud . ' AND productos.id_codigo_producto = productos_solicitudes.productos_id_codigo_producto');
        $_verifica = $_solicitud->where('id_solicitud', $resquest->id_solicitud)->first();
        return view('solicitud.verSolicitud', ['solicitud' => $_verifica,
        'productos' =>$_productosSolicitud, 'area' => $_area->all()]);
      }
    }
    public function actualizarSolicitud(Request $resquest)
    {
      $id_solicitud = $resquest->id_solicitud;
      if(isset($resquest->id_estado))
      {
        $_solicitud = new solicitud();
        $_solicitud->where('id_solicitud', $id_solicitud)->update(['id_estado' => $resquest->id_estado]);

          
      }
      if(!isset($resquest->id_estado))
      {
        $_estado_correo = 'GUARDADA EN PROCESO';
        $_destino[] = Auth::user()->correo;
      }
      else
      {
        $_estado_correo = 'GUARDADA Y ENVIADA';
        $_destino = $this->destinoCorreo(3);
        $_destino[] = Auth::user()->correo;
        //Almacenistas
        $copia = vistaUsuarioRoles::where('id_rol', '=', 3)->pluck('correo');
        $_copia = [];
        foreach ($copia as $key => $value) {
          $_copia[] = $value;
        }
      }
      if($resquest->productosJS != "")
      {
        $_productos = json_decode($resquest->productosJS);
        foreach ($_productos as $llaveP)
        {
          $p = new productosSolicitudControlador();
          $p->guardarProductoSolicitud($id_solicitud, $llaveP[0], $llaveP[1], $llaveP[2]);
        }
      }
       //******+ENVIO de correo *****
      $call = array('estado' => $_estado_correo,
                      'solicitud' =>  $id_solicitud,
                      'fecha' => date("Y-m-d H:i:s")
                    );
        Mail::to($_destino)->cc($_copia)->send(new solicitudGuardada($call));
      //******FIN CORREO************
      return redirect('listarSolicitud')->with('status', 'ok');
    }
    public function eliminarProductoSolicitud($id, $id_solicitud)
    {
      $p = new productos_solicitudes();
      $p->where('id_productos_solicitudes', $id)->delete();
      //return redirect()->action('admon\solicitudControlador@listaSolicitud', ['id_solicitud' => $id_solicitud]);
      return redirect()->route('listarSolicitud');
    }

    public function aprobarSolicitud()
    {
     
      $idUsuario = Auth::user()->id_usuario;
      $d = DB::select('SELECT solicitudes.id_solicitud, estados.nombre_estado, estados.id_estado, fichas.ficha, fichas.id_ficha, fichas.id_proyecto_formativo, solicitudes.fecha FROM solicitudes, estados, fichas WHERE (' . $this->cadenaRoles() . ') AND estados.id_estado = solicitudes.id_estado AND fichas.id_ficha = solicitudes.id_ficha');
      
      return view('solicitud.listarSolicitud', ['solicitudes' => $d]);
    }
    public function HistorialSolicitud()
    {
     
      $idUsuario = Auth::user()->id_usuario;
      $d = DB::select('SELECT solicitudes.id_solicitud, estados.nombre_estado, estados.id_estado, fichas.ficha, fichas.id_ficha, fichas.id_proyecto_formativo,solicitudes.fecha FROM solicitudes, estados, fichas WHERE estados.id_estado = solicitudes.id_estado AND fichas.id_ficha = solicitudes.id_ficha');
      return view('solicitud.listarSolicitud', ['solicitudes' => $d, 'historial' => 'Si']);
    }
    public function solicitarAprobarSolicitud($id)
    {
      if($id >0)
      {
        //id de la solicitud
        $_solicitud = new solicitud();
        $_rol_mayor = $this->rolMayor();
        echo $_rol_mayor;
        switch ($_rol_mayor) {
          case '3':
            //Aprueba Almacen
            $_solicitud->where('id_solicitud', $id)->update(['id_estado' => 3]);
          break;
          case '4':
            //Aprueba Coordinador Academico
            $_solicitud->where('id_solicitud', $id)->update(['id_estado' => 4]);
          break;
          case '5':
            //Aprueba Coordinador Misional
            $_solicitud->where('id_solicitud', $id)->update(['id_estado' => 5]);
          break;
          case '6':
            //Aprueba Coordinador Subdirector
            $_solicitud->where('id_solicitud', $id)->update(['id_estado' => 6]);
          break;
        }
        if ($_rol_mayor <=6) 
        {
          $_rol = $_rol_mayor - 1;
        }
        else
        {
          $_rol = $_rol_mayor;
        }
        $_cc = vistaUsuarioRoles::where('id_rol', '=' ,$_rol)->pluck('correo');

        foreach ($_cc as $key => $value) {
          Mail::to($value)->send(new solicitudAprobada());
        }
       return redirect('aprobarSolicitud');
      }
      else
      {
        return back();
      }
    }
    public function solicitarNoAprobarSolicitud($id)
    {
      if($id >0)
      {
        //id de la solicitud
        $_solicitud = new solicitud();
        $_rol_mayor = $this->rolMayor();
        echo $_rol_mayor;
        switch ($_rol_mayor) {
          case '3':
            //Aprueba Almacen
            $_solicitud->where('id_solicitud', $id)->update(['id_estado' => 1]);
          break;
          case '4':
            //Aprueba Coordinador Academico
            $_solicitud->where('id_solicitud', $id)->update(['id_estado' => 2]);
          break;
          case '5':
            //Aprueba Coordinador Misional
            $_solicitud->where('id_solicitud', $id)->update(['id_estado' => 3]);
          break;
          case '6':
            //Aprueba Coordinador Subdirector
            $_solicitud->where('id_solicitud', $id)->update(['id_estado' => 4]);
          break;
        }
        //Enviar Correo a Rol Menor para informar
        $_cc = vistaUsuarioRoles::where('id_rol', '=' ,$_rol_mayor-1)->pluck('correo');
        $_copia;
        foreach ($_cc as $key => $value) {
          Mail::to($value)->send(new solicitudNoAprobada());
        }
        
        
       return redirect('aprobarSolicitud');
      }
      else
      {
        return back();
      }
    }
    protected function rolMayor()
    {
      $_arreglo = array_column(json_decode($_COOKIE['roles']), 'id');
      sort($_arreglo);
      return array_pop($_arreglo);
    }
    protected function cadenaRoles()
    {
      $_arreglo = array_column(json_decode($_COOKIE['roles']), 'id');
      $_cadena = "";
      foreach ($_arreglo as $key => $value) {
        $_cadena .= 'solicitudes.id_estado = ' . ($value-1) . ' OR ';
      }
      return substr($_cadena, 0, strlen($_cadena)-3);
    }
    public function destinoCorreo($idRol)
    {
      $_destino;
      $result = DB::select('SELECT usuarios.correo FROM usuarios_roles, usuarios WHERE usuarios_roles.id_rol = ' . $idRol . ' AND usuarios.id_usuario = usuarios_roles.id_usuario');//usuarios almacenistas
      foreach($result as $row)
      {
          $_destino[] = $row->correo;
      }
      return $_destino;
    }
}
