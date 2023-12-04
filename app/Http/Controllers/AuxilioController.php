<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuxilioController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/solicitudes');
        $data = $response->json();

        // dd($data);

        return view('dashboard.auxilio.index', compact('data'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/solicitudes/' . $id);
        $solicitud = $response->json();

        return view('dashboard.auxilio.show', compact('solicitud'));
    }


    public function edit(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/solicitudes/' . $id);
        $solicitud = $response->json();

        $response = Http::get($url . '/empleados');
        $empleados = $response->json();

        // Filtrar empleados que tienen el rol de "Mecánico"
        $mecanicos = array_filter($empleados, function ($empleado) {
            return isset($empleado['usuario']['rol']['nombre']) && $empleado['usuario']['rol']['nombre'] === 'Mecánico';
        });

        return view('dashboard.auxilio.edit', compact('solicitud', 'mecanicos'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'tecnico_id' => 'required',
            'estado' => 'required'
        ]);


        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url . '/solicitudes/' . $id, [
            'tecnico_id' => $request->input('tecnico_id'),
            'estado' => $request->input('estado'),
        ]);

        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Solicitud de asistencia actualizado con el ID: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('actualizado', 'Solicitud de asistencia ha sido actualizado exitosamente.');
            return redirect()->route('auxilio.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->back();
        }
    }


    public function destroy(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');

        $response = Http::delete($url . '/solicitudes/' . $id);
        $result = $response->json();
        if ($result && $result['status']) {
            session()->flash('eliminado', 'Solicitud de asistencia eliminada exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('auxilio.index');
    }
}
