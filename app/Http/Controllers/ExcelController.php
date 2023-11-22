<?php

namespace App\Http\Controllers;

use App\Exports\ReporteExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function generarExcel()
    {
        return Excel::download(new ReporteExport, 'reporte.xlsx');
    }
}
