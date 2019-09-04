<?php

namespace App\Http\Controllers\admon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\areas;
use App\entradas_almacen;
use App\elementos_entradas_almacen;
use App\salidas_almacen;
use Auth;
use Validator;
use App\elementos_salida_almacen;


class almacenControlador extends Controller
{
    //
    public function ingreso()
    {
     	$_area = new areas();
     	return view('almacen.entradaAlmacen', ['area' => $_area->all()]);
    }
    public function guardarEntradaAlmacen(Request $res)
    {
    	//Primero creamos la entrada
    	$validar = Validator::make($res->all(),[
        'proveedor' => 'required',
        'fecha_ingreso'  => 'required',
        'factura' => 'required',
        ]);
      if($validar->fails())
      {
      	return back()->withInput()->withErrors($validar);
      }
      else
      {
      	$entrada = new entradas_almacen();
      	$entrada->proveedor = $res->proveedor;
      	$entrada->fecha_ingreso = $res->fecha_ingreso;
      	$entrada->factura = $res->factura;
      	$entrada->id_usuario = Auth::user()->id_usuario;
      	$entrada->save();
      	$id_entrada = $entrada->id_entrada_almacen;
      	$elementos = json_decode($res->productosJS);
      	foreach ($elementos as $llaveP)
      	{
        	$p = new elementos_entradas_almacen();
        	$p->id_entrada_almacen = $id_entrada;
        	$p->id_producto = $llaveP[0];
        	$p->cantidad = $llaveP[1];
        	$p->save();
      	}
      	return back()->with('status', 'Su Codigo de Entrada es:  ' .  $id_entrada);
      }
    	
    }
    public function salidaAlmacen()
    {
    	$_area = new areas();
     	return view('almacen.salidaAlmacen', ['area' => $_area->all()]);
    }
    public function guardarSalidaAlmacen(Request $res)
    {
      $validar = Validator::make($res->all(),[
        'id_usuario_recibe' => 'required',
        'productosJS' => 'required',
        ]);
      if($validar->fails())
      {
        return back()->withInput()->withErrors($validar);
      }
      else
      {
        $salida = new salidas_almacen();
        $salida->id_usuario = Auth::user()->id_usuario;
        $salida->id_usuario_recibe = $res->id_usuario_recibe;
        $salida->save();
        $id_salidaA = $salida->id_salida_almacen;
        $elementos = json_decode($res->productosJS);
        foreach ($elementos as $llaveP)
        {
          $p = new elementos_salida_almacen();
          $p->id_salida_alamcen = $id_salidaA;
          $p->id_producto = $llaveP[0];
          $p->cantidad = $llaveP[1];
          $p->save();
        }
        return back()->with('status', 'Su Codigo de Salida es:  ' .  $id_salidaA);

      }
    }
}
