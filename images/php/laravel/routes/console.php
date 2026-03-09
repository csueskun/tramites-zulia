<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use App\Exports\MasterFeesExport;
use Maatwebsite\Excel\Facades\Excel;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('dev:hash {value}', function ($value) {
    $hashedValue = Hash::make($value);
    $this->comment("Hash: $hashedValue");
})->purpose('Hash the given value');

Artisan::command('report:generate {type}', function ($type) {
    $this->info("Starting report generation for type: $type");

    switch ($type) {
        case 'master-fees':
            $export = new MasterFeesExport();
            $fileName = 'reports/master-fees-' . now()->format('Y-m-d_H-i') . '.xlsx';
            break;
        
        default:
            $this->error("Invalid report type. Available types: master-fees");
            return;
    }

    $path = "public/storage/$fileName";
    Excel::store($export, $fileName, 'public');

    $this->info("Report generated successfully: $path");
})->purpose('Generate an Excel report by type (e.g., master-fees)');
