<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Exports\MasterFeesExport;
use App\Exports\UsersSummaryExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Download the Master Fees Excel Report
     * 
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportMasterFees()
    {
        $fileName = 'catalogo_tasas_costos_' . now()->format('Y-m-d_H-i') . '.xlsx';
        $filePath = 'reports/' . $fileName;

        // Store a copy in the git-ignored storage
        Excel::store(new MasterFeesExport, $filePath, 'public');
        
        return Excel::download(new MasterFeesExport, $fileName);
    }

    /**
     * Download the Users Summary Excel Report
     * 
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportUsersSummary()
    {
        $fileName = 'reporte_resumen_usuarios_' . now()->format('Y-m-d_H-i') . '.xlsx';
        $filePath = 'reports/' . $fileName;

        // Store a copy in the git-ignored storage
        Excel::store(new UsersSummaryExport, $filePath, 'public');
        
        return Excel::download(new UsersSummaryExport, $fileName);
    }
}
