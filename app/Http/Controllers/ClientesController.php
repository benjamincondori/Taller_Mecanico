<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/clientes');
        $data = $response->json();

        $title = '¿Está seguro?';
        $text = "¡Se eliminará el cliente definitivamente!";
        confirmDelete($title, $text);

        return view('dashboard.clientes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'ci' => 'required',
            'nombre' => 'required|string|min:2|max:100',
            'apellido' => 'required|string|min:2|max:100',
            'telefono' => 'required',
            'direccion' => 'required',
            'genero' => 'required|max:1',
            'email' => 'required|string|email|max:100',
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url.'/clientes', [
            'ci' => $request->input('ci'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'direccion' => $request->input('direccion'),
            'genero' => $request->input('genero'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
        ]);

        $result = $response->json();
        if ($result && $result['status']) {
            alert()->success('¡Guardado!','El cliente ha sido guardado exitosamente.');
            return redirect()->route('clientes.index');
        } else {
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('clientes.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/clientes/'.$id);

        $cliente = $response->json();
        return view('dashboard.clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            'ci' => 'required',
            'nombre' => 'required|string|min:2|max:100',
            'apellido' => 'required|string|min:2|max:100',
            'telefono' => 'required',
            'direccion' => 'required',
            'genero' => 'required|max:1',
            'email' => 'required|string|email|max:100',
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url.'/clientes/'.$id, [
            'ci' => $request->input('ci'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'genero' => $request->input('genero'),
            'email' => $request->input('email'),
        ]);

        $result = $response->json();
        if ($result && $result['status'] ) {
            alert()->success('¡Actualizado!','El cliente ha sido actualizado exitosamente.');
            return redirect()->route('clientes.index');
        } else {
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('clientes.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');

       
        $response = Http::delete($url.'/clientes/'.$id);
        $result = $response->json();

        if ($result && $result['status']) {
            alert()->success('Eliminado!','El cliente ha sido eliminado exitosamente.');
        } else {
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('clientes.index');
    }
}
