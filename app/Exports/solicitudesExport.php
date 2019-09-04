<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use App\solicitudesAprobadas;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\pedidoArea;



//class solicitudesExport implements FromCollection, WithHeadings, ShouldAutoSize
class solicitudesExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
   
    public function sheets(): array
    {
        $sheets = [];
        $_datos = solicitudesAprobadas::distinct()->pluck('nombre_area');

        foreach ($_datos as $_dato) {

             $sheets[] = new pedidoArea($_dato);
        }
        return $sheets;
    }
   
}
