<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Exports\MasterFeesExport;
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
        
        return Excel::download(new MasterFeesExport, $fileName);
    }
}
