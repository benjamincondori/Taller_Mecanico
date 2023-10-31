<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ModeloController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/modelos');
        $modelos = $response->json();

        return view('dashboard.modelos.index', compact('modelos'));
    }


    public function create()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/marcas');
        $marcas = $response->json();
        return view('dashboard.modelos.create', compact('marcas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
            'marca_id' => 'required',
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/modelos', [
            'nombre' => $request->input('nombre'),
            'marca_id' => $request->input('marca_id'),
        ]);
        $result = $response->json();

        if ($result && $result['status']) {
            session()->flash('guardado', 'El modelo ha sido guardado exitosamente.');
            return redirect()->route('modelos.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('modelos.create');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/marcas');
        $marcas = $response->json();

        $response = Http::get($url . '/modelos/' . $id);
        $modelo = $response->json();

        return view('dashboard.modelos.edit', compact('modelo', 'marcas'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
            'marca_id' => 'required',
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url . '/modelos/' . $id, [
            'nombre' => $request->input('nombre'),
            'marca_id' => $request->input('marca_id'),
        ]);

        $result = $response->json();

        if ($result && $result['status']) {
            session()->flash('actualizado', 'El modelo ha sido actualizado exitosamente.');
            return redirect()->route('modelos.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('modelos.edit', $id);
        }
    }

    public function destroy(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url . '/modelos/' . $id);
        $result = $response->json();

        if ($result && $result['status']) {
            session()->flash('eliminado', 'El modelo ha sido eliminado exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }

        return redirect()->route('modelos.index');
    }
}
