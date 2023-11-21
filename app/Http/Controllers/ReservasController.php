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
        if($reservas){
            foreach ($reservas as $reserva){
                $events[] = [
                    'id' => $reserva['id'],
                    'title' => $reserva['servicio']['nombre'].' - '.$reserva['cliente']['apellido'],
                    'start' => $reserva['fecha'].' '.$reserva['hora_inicio'],
                    'end' => $reserva['fecha'].' '.$reserva['hora_fin'],
                ];
            }
        }
        
        // si o si se tiene que llamar events para el calendario
       

        return view('dashboard.reserva.index', compact('events'));
    }


    public function create()
    {
        
        
        
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $ResponseServicios = Http::get($url.'/servicios');
        $Servicios = $ResponseServicios->json();

        $idUsuario = Session::get('usuario.id');
        $ResponseEmpleado = Http::get($url.'/usuarios/'.$idUsuario);
        $UsuarioEmpleado = $ResponseEmpleado->json();

        $ResponseClientes = Http::get($url.'/clientes');
        $Clientes = $ResponseClientes->json();

        return view('dashboard.reserva.create',compact('Servicios','UsuarioEmpleado','Clientes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'estado' => 'required',
            'servicio_id' => 'required',
            'cliente_id' => 'required',
            'empleado_id' => 'required'
        ]);

        // por alguna razon se suma 4 horas a cualquiera de las 2 variables de tiempo convertidas a int. Pero al
        // añadirle otra que es 00:00:00 se arregla   ???????

        //aaa tambien le estoy poniendo una variacion de un segundo por que el calendario acepta solo 
        //hora mayores (>) que la hora que termina el evento 
        $hora_fin = strtotime($request->input('hora_fin'));
        $segundo_margen = strtotime('00:00:01');
        $hora_time= $hora_fin - $segundo_margen + strtotime('00:00:00');
        $nueva_hora_fin = date('H:i:s',$hora_time);
        

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url.'/reservas',[
            'fecha' => $request->input('fecha'),
            'hora_inicio' => $request->input('hora_inicio'),
            'hora_fin' => $nueva_hora_fin,
            'estado' => $request->input('estado'),
            'servicio_id' => $request->input('servicio_id'),
            'cliente_id' => $request->input('cliente_id'),
            'empleado_id' => $request->input('empleado_id')
        ]);

        $result = $response->json();


        if ($result && $result['status']) {

            $descripcion = 'Reserva creado con el ID: ' . $result['reserva']['id'];
            registrarBitacora($descripcion);

            session()->flash('guardado', 'La reserva ha sido guardada exitosamente.');
            return redirect()->route('reserva.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->back();
        }
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
