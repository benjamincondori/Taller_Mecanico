<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class ReservasController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $responseReserva = Http::get($url.'/reservas');
        $reservas = $responseReserva->json();

        $events = [];
        foreach ($reservas as $reserva){
            $events[] = [
                'title' => $reserva['servicio']['nombre'].' - '.$reserva['cliente']['apellido'],
                'start' => $reserva['fecha'].' '.$reserva['hora_inicio'],
                'end' => $reserva['fecha'].' '.$reserva['hora_fin'],
            ];
        }
        // si o si se tiene que llamar events para el calendario

        $ResponseServicios = Http::get($url.'/servicios');
        $Servicios = $ResponseServicios->json();

        $idUsuario = Session::get('usuario.id');
        $ResponseEmpleado = Http::get($url.'/usuarios/'.$idUsuario);
        $UsuarioEmpleado = $ResponseEmpleado->json();

        $ResponseClientes = Http::get($url.'/clientes');
        $Clientes = $ResponseClientes->json();

        $hora = strtotime('15:00:00');
        $duracion = strtotime('01:00:00');
        // por alguna razon se suma 4 horas a cualquiera de las 2 variables de tiempo convertidas a int. Pero a la hora
        // de añadirle otra que es 00:00:00 se arregla   ???????

        //aaa tambien le estoy poniendo una variacion de un segundo por que el calendario acepta solo 
        //hora mayores (>) que la hora que termina el evento 
        $hora_time= $hora + $duracion - strtotime('00:00:01');
        $hora_fin = date('H:i:s',$hora_time);

        dd($hora_fin);

        return view('dashboard.reserva.index', compact('events','Servicios','UsuarioEmpleado','Clientes','hora','hora_fin'));
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
