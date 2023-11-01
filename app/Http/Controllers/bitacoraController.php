<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class bitacoraController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/bitacoras');
        $data = $response->json();

        return view('dashboard.bitacora.index', compact('data')); 
    }

}
