<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\consolidadoSolicitudesModelo;

class solicitudesAprobadas implements FromCollection, WithTitle, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return ['id_solicitud', 'id_estado', 'fecha', 'id_ficha', 'id_proyecto_formativo', 'ficha', 'estad_ficha', 'documento', 'nombre_usuario', 'nombre_area'];
    }
    public function collection()
    {
        return  consolidadoSolicitudesModelo::where('id_estado', 6)->get();
    }
    public function title(): string
    {
    	return 'Solicitudes Aprobadas';
    }
}
