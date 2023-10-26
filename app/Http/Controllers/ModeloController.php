<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ModeloController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/modelo');
        $data = $response->json();

        return view('dashboard.modelos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/marca');
        $marcas = $response->json();
        return view('dashboard.modelos.create', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
            'marca_id' => 'required',
        ]);

        // dd($request->input('nombre'), $request->input('marca_id'));

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url.'/modelo', [
            'nombre' => $request->input('nombre'),
            'marca_id' => $request->input('marca_id'),
        ]);
        // dd($response);
        $result = $response->json();
        if ($result && $result['status']) {
            alert()->success('¡Guardado!','El modelo ha sido guardado exitosamente.');
            return redirect()->route('modelos.index');
        } else {
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('modelos.create');
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
    public function edit($modelo)
    {

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/marca');
        $marcas = $response->json();

        $response = Http::get($url.'/modelo/'.$modelo);
        // dd($response);

        $modelo = $response->json();
        return view('dashboard.modelos.edit', compact('modelo', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
            'marca_id' => 'required',
        ]);

        $id = $request->id;

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url.'/modelo/'.$id, [
            'nombre' => $request->input('nombre'),
            'marca_id' => $request->input('marca_id'),
        ]);

        $result = $response->json();
        if ($result && $result['status'] ) {
            alert()->success('¡Actualizado!','El cliente ha sido actualizado exitosamente.');
            return redirect()->route('modelos.index');
        } else {
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('modelos.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
