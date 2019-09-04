<?php

namespace App\Http\Controllers\admon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\codigoUNSPSC;
use Validator;

class codigoUNSPSControlador extends Controller
{
    public function index()
    {
      return view('codigoUNSPSC.codigos');
    }
    public function guardarCodigo(Request $resquest)
    {
      $validar = Validator::make($resquest->all(),[
        'id_codigo_unspcs' => 'required|numeric',
        'descripcion' => 'required'
        ]);
      if($validar->fails())
      {
        return back()->withInput()->withErrors($validar);
      }
      $_codigo = new codigoUNSPSC();
      $_codigo->id_codigo_unspcs = $resquest->id_codigo_unspcs;
      $_codigo->descripcion = $resquest->descripcion;
      $_codigo->save();
      return back()->with('status', 'ok');
    }
    public function buscarCodigoUNSPSC(Request $resquest)
    {
      return view('codigoUNSPSC.BuscarCodigos');
      //Product::where('title', 'LIKE', '%'.$keyword.'%')->get()
    }
    public function buscandoCodigoUNSPSC(Request $resquest)
    {
      $_codigo = new codigoUNSPSC();
      if($resquest->id_codigo_unspcs != "" && $resquest->descripcion != "")
      {
        $a = $_codigo->where('id_codigo_unspcs', 'LIKE', $resquest->id_codigo_unspcs.'%')
        ->where('descripcion', 'LIKE', '%'.$resquest->descripcion.'%')
        ->where('estado', 'Activo')
        ->get();
      }
      else
      {
        if($resquest->id_codigo_unspcs != "")
        {
          $a = $_codigo->where('id_codigo_unspcs', 'LIKE', $resquest->id_codigo_unspcs.'%')
          ->where('estado', 'Activo')
          ->get();
        }
        if($resquest->descripcion != "")
        {
          $a = $_codigo->where('descripcion', 'LIKE', '%'.$resquest->descripcion.'%')
          ->where('estado', 'Activo')
          ->get();
        }
      }
      return back()->with('datos', $a);
    }
    public function aprobarCodigo(Request $resquest)
    {

      if($resquest->id_codigo_unspcs != "")
      {
        $_codigo = new codigoUNSPSC();
        $_codigo->find($resquest->id_codigo_unspcs)->update(['estado' => 'Activo']);
      }
      $_codigo = new codigoUNSPSC();
      return view('codigoUNSPSC.aprobarCodigo', [ 'codigos' => $_codigo->where('estado', 'Pendiente')->get() ]);

    }
    public function solicitarCodigoUNSPSC()
    {
      return view('codigoUNSPSC.solicitarCodigos');
    }
    public function solicitandoCodigo(Request $resquest)
    {
      $validar = Validator::make($request->all(),[
        'id_codigo_unspcs' => 'required|numeric',
        'descripcion' => 'required'
        ]);
      if($validar->fails())
      {
        return back()->withInput()->withErrors($validar);
      }
      $_codigo = new codigoUNSPSC();
      $_codigo->id_codigo_unspcs = $resquest->id_codigo_unspcs;
      $_codigo->descripcion = $resquest->descripcion;
      $_codigo->estado = 'Pendiente';
      $_codigo->save();
      return back()->with('status', 'ok');
    }
    public function jsf()
    {
      $id = $_POST['id_codigo_unspcs'];
      $des = $_POST['descripcion'];

      $_codigo = new codigoUNSPSC();
      if($id != "" && $des != "")
      {
        $a = $_codigo->where('id_codigo_unspcs', 'LIKE', $id.'%')
        ->where('descripcion', 'LIKE', '%'.$des.'%')
        ->where('estado', 'Activo')
        ->get();
      }
      else
      {
        if($id != "")
        {
          $a = $_codigo->where('id_codigo_unspcs', 'LIKE', $id.'%')
          ->where('estado', 'Activo')
          ->get();
        }
        if($des != "")
        {
          $a = $_codigo->where('descripcion', 'LIKE', '%'.$des.'%')
          ->where('estado', 'Activo')
          ->get();
        }
      }
        echo json_encode($a);
    }
}
