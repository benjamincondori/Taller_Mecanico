<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MarcaController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/marcas');
        $data = $response->json();
        return view('dashboard.marcas.index', compact('data'));
    }


    public function create()
    {
        return view('dashboard.marcas.create');
    }


    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/marcas', [
            'nombre' => $request->input('nombre'),
        ]);

        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Marca creada con el ID: ' . $result['marca']['id'];
            registrarBitacora($descripcion);

            session()->flash('guardado', 'La marca ha sido guardada exitosamente.');
            return redirect()->route('marcas.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->back();
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/marcas/' . $id);
        $marca = $response->json();
        return view('dashboard.marcas.edit', compact('marca'));
    }


    public function update(Request $request, string $id)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url . '/marcas/' . $id, [
            'nombre' => $request->input('nombre'),
        ]);

        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Marca actualizada con el ID: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('actualizado', 'La marca ha sido actualizada exitosamente.');
            return redirect()->route('marcas.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('marcas.edit', $id);
        }
    }


    public function destroy(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url . '/marcas/' . $id);
        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Marca eliminada con el ID: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('eliminado', 'La marca ha sido eliminada exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('marcas.index');
    }
}
