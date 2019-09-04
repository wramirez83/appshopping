<?php

namespace App\Http\Controllers\admon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\areas;
use Validator;

class areasControlador extends Controller
{
    public function index()
    {
      $_areas = new areas();
      $_datos['areas'] = $_areas->all();
      return view('areas.areas', $_datos);
    }
    public function guardarArea(Request $request)
    {
      $_validacion = Validator::make($request->all(),[
        'nombre_area' => 'required'
      ]);
      if($_validacion->fails())
      {
        return back()->withInput()->withErrors($_validacion);
      }
      $_areas = new areas();
      $_areas->nombre_area = $request->nombre_area;
      $_areas->save();
      return back()->with('status', 'ok');
    }
}
