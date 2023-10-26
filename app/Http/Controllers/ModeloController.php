<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ModeloController extends Controller
{
   /* public function index()
    {
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/modelos');
        $data = $response->json();

        return view('dashboard.modelos.index', compact('data'));
    }*/
    public function index()
{
    $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
    $response = Http::get($url.'/modelos');
    $modelos = $response->json();

    // Fetch brand information
    $responseMarcas = Http::get($url.'/marcas');
    $marcas = $responseMarcas->json();

    return view('dashboard.modelos.index', compact('modelos', 'marcas'));
}


    public function create()
    {
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
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
        
        // dd($request->input('nombre'), $request->input('marca_id'));

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url.'/modelo', [
            'nombre' => $request->input('nombre'),
            'marca_id' => $request->input('marca_id'),
        ]);
        $result = $response->json();
        if ($result && $result['status']) {
            alert()->success('¡Guardado!', 'El modelo ha sido guardado exitosamente.');
            return redirect()->route('modelos.index');
        } else {
            alert()->error('Oops...', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('modelos.create');
        }
    }

    public function show(string $id)
    {
        //
    }

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

    public function update(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
            'marca_id' => 'required',
        ]);

        $id = $request->id;

        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url . '/modelos/' . $id, [
            'nombre' => $request->input('nombre'),
            'marca_id' => $request->input('marca_id'),
        ]);

        $result = $response->json();
        if ($result && $result['status']) {
            alert()->success('¡Actualizado!', 'El cliente ha sido actualizado exitosamente.');
            return redirect()->route('modelos.index');
        } else {
            alert()->error('Oops...', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('modelos.edit', ['modelo' => $id]);


        }
    }

    public function destroy(string $id)
    {
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url.'/modelos/'.$id);
        $result = $response->json();
        if ($result && $result['status']) {
            alert()->success('¡Eliminado!', 'El modelo ha sido eliminado exitosamente.');
            
        } else {
            alert()->error('Oops...', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            
        }
        return redirect()->route('modelos.index');

    }
}
