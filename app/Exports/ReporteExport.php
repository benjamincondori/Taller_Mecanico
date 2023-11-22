<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReporteExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/orden-trabajos');
        $data = $response->json();
        // dd($data);
        $ordenes = collect($data);
        // dd($ordenes);

        return view('dashboard.reportesExcel.export_ordenes', compact('ordenes'));
    }
}
