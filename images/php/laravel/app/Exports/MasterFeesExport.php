<?php

namespace App\Exports;

use App\Models\TramiteItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Support\Collection;

class MasterFeesExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Fetching all items with their associated tramite to flatten the report
        return TramiteItem::with('tramite')->get();
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Catálogo de Tasas y Costos';
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Trámite',
            'Item/Concepto',
            'Tipo',
            'Aplica a Persona',
            'Aplica a Vehículo',
            'Precio',
            'Última Actualización'
        ];
    }

    /**
     * @param mixed $item
     * @return array
     */
    public function map($item): array
    {
        return [
            $item->tramite->nombre ?? 'N/A',
            $item->nombre,
            $item->tipo,
            $item->persona,
            $item->vehiculo,
            $item->precio,
            $item->updated_at ? $item->updated_at->format('Y-m-d') : 'N/A',
        ];
    }
}
