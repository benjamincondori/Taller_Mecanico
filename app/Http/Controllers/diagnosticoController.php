<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class diagnosticoController extends Controller
{
    public function index(){
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/diagnosticos');
        $data = $response->json();
        return view('dashboard.diagnostico.index', compact('data'));
    }

    public function create()
    {
        if (!verificarPermiso('Agregar_Diagnosticos')) {
            session()->flash('accesoDenegado');
            return redirect()->back();
        }

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/vehiculos');
        $vehiculos = $response->json();
        return view('dashboard.diagnostico.create', compact('vehiculos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'recomendaciones' => 'required|string',
            'vehiculo_id' => 'required'
        ]);
        dd(now());

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/diagnosticos', [
            'descripcion' => $request->input('descripcion'),
            'recomendaciones' => $request->input('recomendaciones'),
            'vehiculo_id' => $request->input('vehiculo_id'),
            'fecha' => now(),
        ]);

        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Diagnóstico creado con el ID: ' . $result['diagnostico']['id'];
            registrarBitacora($descripcion);

            session()->flash('guardado', 'El diagnóstico ha sido guardado exitosamente.');
            return redirect()->route('diagnostico.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->back();
        }
    }


    public function show(string $id)
    {
        if (!verificarPermiso('Ver_Diagnosticos')) {
            session()->flash('accesoDenegado');
            return redirect()->back();
        }
    }


    public function edit(string $id)
    {
        if (!verificarPermiso('Editar_Diagnosticos')) {
            session()->flash('accesoDenegado');
            return redirect()->back();
        }

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/diagnosticos/' . $id);
        $diagnostico = $response->json();

        $response = Http::get($url . '/vehiculos');
        $vehiculos = $response->json();

        return view('dashboard.diagnostico.edit', compact('diagnostico', 'vehiculos'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'recomendaciones' => 'required|string',
            'vehiculo_id' => 'required'
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url . '/diagnosticos/' . $id, [
            'descripcion' => $request->input('descripcion'),
            'recomendaciones' => $request->input('recomendaciones'),
            'vehiculo_id' => $request->input('vehiculo_id'),
            'fecha' => now(),
        ]);

        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Diagnóstico actualizado con el ID: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('actualizado', 'El diagnóstico ha sido actualizado exitosamente.');
            return redirect()->route('diagnostico.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('diagnostico.edit', $id);
        }
    }


    public function destroy(string $id)
    {
        if (!verificarPermiso('Eliminar_Diagnosticos')) {
            session()->flash('accesoDenegado');
            return redirect()->back();
        }

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url . '/diagnosticos/' . $id);
        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Diagnóstico eliminado con el ID: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('eliminado', 'El diagnóstico ha sido eliminado exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('diagnostico.index');
    }
}
