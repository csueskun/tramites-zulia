<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class UsersSummaryExport implements FromCollection, ShouldAutoSize, WithTitle, WithHeadings, WithStyles
{
    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Etiqueta',
            'Valor'
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold (headers: Etiqueta, Valor)
            1 => ['font' => ['bold' => true]],
            // Style the row with "Usuarios Por Tipo" (Row 6)
            6 => ['font' => ['bold' => true]],
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $rows = new Collection();

        // 1. Total de Usuarios registrados
        $rows->push(['Total de Usuarios registrados', User::count() ?? 0]);

        // 2. Usuarios Activos
        $rows->push(['Usuarios Activos', User::whereNotNull('email_verified_at')->count() ?? 0]);

        // 3. Usuarios Nuevos (last 30 days)
        $rows->push(['Usuarios Nuevos', User::where('created_at', '>=', now()->subDays(30))->count() ?? 0]);

        // 4. Usuarios Inactivos
        $rows->push(['Usuarios Inactivos', User::whereNull('email_verified_at')->count() ?? 0]);

        // 5. Header for types (Row 6)
        $rows->push(['Usuarios Por Tipo', 0]);

        // Role Breakdown (Ensuring 0 if empty)
        $roles = ['ADMIN', 'USER', 'RADICADO'];
        $counts = User::select('role', DB::raw('count(*) as total'))
            ->groupBy('role')
            ->pluck('total', 'role');

        foreach ($roles as $role) {
            $rows->push([$role, $counts->get($role, 0)]);
        }

        return $rows;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Resumen de Usuarios';
    }
}
