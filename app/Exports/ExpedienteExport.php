<?php

namespace App\Exports;

use App\Expediente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExpedienteExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $expedientes;

    public function __construct($expedientes)
    {
        $this->expedientes = $expedientes;
    }
 

    public function headings(): array
    {
        return [
            'FECHA',
            'Nro Expediente',
            'TIPO',
            'ASUNTO',
            'REMITENTE',
            'ESTADO',
            'CODIGO',
          
        ];
    }
    public function collection()
    {
        return $this->expedientes;
    }
}
