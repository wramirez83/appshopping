<?php

namespace App\Http\Controllers\admon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\solicitudesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\solicitudesAprobadas;
use App\consolidadoSolicitudesModelo;
use App\solicitud;



class reportes extends Controller
{
	public function index()
	{
		return view('reportes.reporte');
	}
   public function reporteAprobados()
   {
   		return Excel::download(new solicitudesExport, 'Consolidado de Solicitudess.xlsx');
   }
   public function solicitudesAprobadas(Request $res)
   {
   	return Excel::download(new solicitudesAprobadas, 'Reporte Solicitudes Aprobadas.xlsx');
   }
}
