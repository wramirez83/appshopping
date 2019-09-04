<?php

namespace App\Http\Controllers\admon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\programas;
use Validator;

class programaFormacionControlador extends Controller
{
    public function index()
    {
      return view('programas.crearPrograma');
    }
    public function guardarProgramaFormacion(Request $request)
    {
      $_validacion = Validator::make($request->all(), [
        'nombre_programa' => 'required',
        'codigo'          => 'required|numeric',
        'version'         => 'required|numeric'
      ]);
      if($_validacion->fails())
      {
        return back()->withInput()->withErrors($_validacion);
      }
      $_programa = new programas();
      $_programa->nombre_programa = $request->nombre_programa;
      $_programa->codigo = $request->codigo;
      $_programa->version = $request->version;
      $_programa->nivel = $request->nivel;
      $_programa->save();
      return back()->with('status', 'ok');
    }
    public function listarPrograma()
    {
      $_programa = new programas();
      return view('programas.listarPrograma', ['programas' => $_programa->all()]);
    }
    public function modificarPrograma(Request $request)
    {
      $_programa = new programas();
      $_programa->find($request->id_programa)->update([
      'nombre_programa' => $request->nombre_programa,
      'codigo' => $request->codigo,
      'version' => $request->version]);

      return redirect()->route('listarPrograma');
    }
}
