<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReservasController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/reservas');
        $reservas = $response->json();

        $events = [];
        foreach ($reservas as $reserva){
            $events[] = [
                'title' => $reserva['servicio']['nombre'].' - '.$reserva['cliente']['apellido'],
                'start' => $reserva['fecha'].' '.$reserva['hora_inicio'],
                'end' => $reserva['fecha'].' '.$reserva['hora_fin'],
            ];
        }
        return view('dashboard.reserva.index', compact('events'));
    }


    public function create()
    {
        
    }


    public function store(Request $request)
    {
       
    }


    public function show(string $id)
    {
       
    }


    public function edit(string $id)
    {
       
    }


    public function update(Request $request, string $id)
    {
        
    }


    public function destroy(string $id)
    {
    
    }
}
