<?php

namespace App\Http\Controllers\admon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ficha;
use App\proyecto;
use Validator;

class fichaControlador extends Controller
{
    public function index()
    {
      $_proyecto = new proyecto();
      $_ficha =  ficha::paginate();
      return view('ficha.ficha', ['proyecto' => $_proyecto->all(), 'fichas' => $_ficha]);
    }
    public function guardarFicha(Request $request)
    {
      $validar = Validator::make($request->all(),[
        'ficha' => 'required|numeric',
        'id_proyecto_formativo' => 'required|numeric'
        ]);
      if($validar->fails())
      {
        return back()->withInput()->withErrors($validar);
      }
      $_ficha = new ficha();
      $_ficha->ficha = $request->ficha;
      $_ficha->id_proyecto_formativo = $request->id_proyecto_formativo;
      $_ficha->save();
      return back()->with('status', 'ok');
    }
}
