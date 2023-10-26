<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class bitacoraController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/bitacoras');
        $bitacoras = $response->json(); // Esto obtendría la respuesta en formato JSON desde la API

        return view('dashboard.bitacora.index', compact('bitacoras')); // Pasa los datos de la API a la vista
    }
    
}
