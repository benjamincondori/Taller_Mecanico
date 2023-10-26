<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MarcaController extends Controller
{
    public function index()
    {
        return view('dashboard.marcas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
        ]);

        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/marcas', [
            'nombre' => $request->input('nombre'),
        ]);
        $result = $response->json();
        if ($result && $result['status']) {
            alert()->success('¡Guardado!', 'La marca ha sido guardada exitosamente.');
            return redirect()->route('marcas.index');
        } else {
            alert()->error('Oops...', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('marcas.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/marcas/' . $id);
        $marca = $response->json();
        return view('dashboard.marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
        ]);

        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url . '/marcas/' . $id, [
            'nombre' => $request->input('nombre'),
        ]);
        $result = $response->json();
        if ($result && $result['status']) {
            alert()->success('¡Actualizado!', 'La marca ha sido actualizada exitosamente.');
            return redirect()->route('marcas.index');
        } else {
            alert()->error('Oops...', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('marcas.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url . '/marcas/' . $id);
        $result = $response->json();
        if ($result && $result['status']) {
            alert()->success('¡Eliminado!', 'La marca ha sido eliminada exitosamente.');
            
        } else {
            alert()->error('Oops...', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            
        }
        return redirect()->route('marcas.index');
    }
}
