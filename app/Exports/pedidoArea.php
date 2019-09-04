<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\solicitudesAprobadas;

class pedidoArea implements FromCollection, WithTitle, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $_area;

    public function __construct(string $_area)
    {
       $this->_area = $_area; 
    }
     public function headings(): array
    {
        return [
            'Cantidad',
            'Nombre de Producto',
            'Detalle de Producto',
            'unidad_medida',
            'codigos_unspcs',
            'Precio',
            'Total',
            'Area',
            'Vigencia'
        ];
    }
    public function collection()
    {
        return solicitudesAprobadas::where('nombre_area', $this->_area)->get();
    }
    public function title(): string
    {
    	return $this->_area;
    }
}
