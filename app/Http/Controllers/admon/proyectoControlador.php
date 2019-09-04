<?php

namespace App\Http\Controllers\admon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\programas;
use App\proyecto;
use Validator;


class proyectoControlador extends Controller
{
    public function index()
    {
      $_programa = new programas();
      $_programas = $_programa->all();
      return view('proyecto.proyecto', ['programas' => $_programas]);
    }
    public function guardarProyecto(Request $request)
    {
      $_validacion = Validator::make($request->all(), [
        'id_programa'       => 'required',
        'nombre_proyecto'   => 'required',
        'codigo'            => 'required|numeric',
        'pdf_proyecto'      => 'required|mimes:pdf|max:2500'
      ]);
      if($_validacion->fails())
      {
        return back()->withInput()->withErrors($_validacion);
      }
      $_proyecto = new proyecto();
      $_proyecto->id_programa = $request->id_programa;
      $_proyecto->nombre_proyecto = $request->nombre_proyecto;
      $_proyecto->codigo = $request->codigo;
      $_proyecto->save();
      $idProyecto = $_proyecto->id_proyecto_formativo;
      $file = $request->file('pdf_proyecto');
      \Storage::disk('proyectos')->put($idProyecto . '.pdf',  \File::get($file));
      return back()->with('status', 'ok');

    }
    public function listarProyecto()
    {
      $_programa = new programas();
      $_programas = $_programa->all();

      $_proyecto = new proyecto();
      return view('proyecto.listarProyecto', ['programas' => $_programas, 'proyectos' => $_proyecto->all()]);
    }
}
