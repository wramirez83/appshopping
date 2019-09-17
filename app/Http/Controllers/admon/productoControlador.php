<?php

namespace App\Http\Controllers\admon;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\areas;
use App\codigoUNSPSC;
use App\producto;
use App\vistaProductosModelo;
use App\unidades_medida;
use Validator;
use App\usuarios_roles;
use Auth;
class productoControlador extends Controller
{
    public function index()
    {
      $_area = new areas();
      $_unidad = new unidades_medida;
      return view('producto.producto', ['area' => $_area->all(), 'unidades_medida' => $_unidad->all()]);
    }
    public function guardarProducto(Request $request)
    {
      $validar = Validator::make($request->all(),[
        'id_area' => 'required|numeric',
        'nombre'  => 'required',
        'detalles_producto' => 'required',
        'precio_unitario' => 'required|numeric',
        'unidad_medida' => 'required',
        'codigos_unspcs_id_codigo_unspcs' => 'required|numeric',
        'foto'  =>  'mimes:jpeg,png,jpg|max:5000'
        ]);
      if($validar->fails())
      {
        return back()->withInput()->withErrors($validar);
      }
      $_producto = new producto();
      $_producto->id_area = $request->id_area;
       $_producto->idUsuario = Auth::user()->id_usuario;
      $_producto->nombre = $_producto->nombre = $request->nombre;
      $_producto->detalles_producto = $request->detalles_producto;
      $_producto->precio_unitario = $request->precio_unitario;
      $_producto->unidad_medida = $request->unidad_medida;
      $_producto->codigos_unspcs_id_codigo_unspcs = $request->codigos_unspcs_id_codigo_unspcs;
      //Si existe foto se realiza el siguiente proceso
      if(isset($request->foto))
      if($request->file('foto')->isValid())
      {
        $_producto->foto = base64_encode(file_get_contents( $request->foto->getRealPath()));
        $_producto->tipo_foto = $request->foto->extension();
      }
      //***** FIN FOTO *******************************
      $_producto->save();
      return back()->with('status', 'ok');
    }
    public function buscarProducto()
    {
      $_edicion = "No";
      $_roles = usuarios_roles::where('id_usuario', Auth::user()->id_usuario)->get();
      foreach ($_roles as $key => $value) {
        if($value->id_rol == '1' || $value->id_rol == '7')
        {
          $_edicion = "Si";
        }
      }
      $_area = new areas();
      return view('producto.buscarProducto', ['area' => $_area->all(), 'edicion' => $_edicion]);
    }
    public function buscandoProducto()
    {
      //$_producto = new producto();
      $_cadena = "";
      $id_area = $_POST['id_area'];
      $nombre = $_POST['nombre'];
      $detalles_producto = $_POST['detalles_producto'];
      $codigos_unspcs_id_codigo_unspcs = $_POST['id_codigo_unspcs'];

      /*$datos =$_producto->orWhere('id_area', $id_area)
      ->orWhere('nombre', 'LIKE', '%'.$nombre.'%')
      ->orWhere('detalles_producto', 'LIKE', '%'.$detalles_producto.'%')
      ->orWhere('codigos_unspcs_id_codigo_unspcs', 'LIKE', '%'.$codigos_unspcs_id_codigo_unspcs.'%')
      ->get();*/

      if($id_area != "")
      {
        $_cadena .= "id_area = " .  $id_area . " AND ";
      }
      if($nombre != "")
      {
        $_cadena .= "nombre LIKE '%" .  $nombre . "%' AND ";
      }
      if($detalles_producto != "")
      {
        $_cadena .= "detalles_producto LIKE '%" .  $detalles_producto . "%' AND ";
      }
      if($codigos_unspcs_id_codigo_unspcs != "")
      {
        $_cadena .= "codigos_unspcs_id_codigo_unspcs =" .  $codigos_unspcs_id_codigo_unspcs . " AND ";
      }
      $_cadena = substr($_cadena, 0, -5);
      $datos =  DB::table('productos')->whereRaw($_cadena)->get();
      echo json_encode($datos);
    }
    public function modificar(Request $res)
    {
      $_producto = vistaProductosModelo::find($res->id);
      $_area = new areas();
      $_unidad = new unidades_medida;
      return view('producto.modificarProducto', ['area' => $_area->all(), 'unidades_medida' => $_unidad->all(), '_producto' => $_producto]);
    }
    public function actualizando(Request $request)
    {
       $validar = Validator::make($request->all(),[
        'id_codigo_producto' => 'required',
        'id_area' => 'required|numeric',
        'nombre'  => 'required',
        'detalles_producto' => 'required',
        'precio_unitario' => 'required|numeric',
        'unidad_medida' => 'required',
        'codigos_unspcs_id_codigo_unspcs' => 'required|numeric',
        'foto'  =>  'mimes:jpeg,png,jpg|max:5000'
        ]);
      if($validar->fails())
      {
        return back()->withInput()->withErrors($validar);
      }
      $_producto = producto::find($request->id_codigo_producto);
      $_producto->id_area = $request->id_area;
      $_producto->idUsuario = Auth::user()->id_usuario;
      $_producto->nombre = $_producto->nombre = $request->nombre;
      $_producto->detalles_producto = $request->detalles_producto;
      $_producto->precio_unitario = $request->precio_unitario;
      $_producto->unidad_medida = $request->unidad_medida;
      $_producto->codigos_unspcs_id_codigo_unspcs = $request->codigos_unspcs_id_codigo_unspcs;
      //Si existe foto se realiza el siguiente proceso
      if(isset($request->foto))
      if($request->file('foto')->isValid())
      {
        $_producto->foto = base64_encode(file_get_contents( $request->foto->getRealPath()));
        $_producto->tipo_foto = $request->foto->extension();
      }
      //***** FIN FOTO *******************************
      $_producto->save();
      return back()->with('status', 'ok');
    }
}
