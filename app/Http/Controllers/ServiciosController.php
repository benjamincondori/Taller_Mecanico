<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ServiciosController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/servicios');
        $data = $response->json();
        return view('dashboard.servicios.index',compact('data'));
    }


    public function create()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/categorias');
        $categorias = $response->json();

        return view('dashboard.servicios.create',compact('categorias'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'categoria_id' => 'required'
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url.'/servicios',[
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
            'categoria_id' => $request->input('categoria_id')
        ]);

        $result = $response->json();

        if ($result && $result['status']) {
            session()->flash('guardado', 'El servicio ha sido guardado exitosamente.');
            return redirect()->route('servicios.index');
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
        $response = Http::get($url.'/servicios/'.$id);
        $servicio = $response->json();

        $response = Http::get($url.'/categorias');
        $categorias = $response->json();

        return view('dashboard.servicios.edit',compact('servicio', 'categorias'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'categoria_id' => 'required'
        ]);
        
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url.'/servicios/'.$id,[
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
            'categoria_id' => $request->input('categoria_id')
        ]);

        $result = $response->json();

        if ($result && $result['status']) {
            session()->flash('actualizado', 'El servicio ha sido actualizado exitosamente.');
            return redirect()->route('servicios.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('servicios.edit', $id);
        }
    }


    public function destroy(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url.'/servicios/'.$id);
        $result = $response->json();
        
        if ($result && $result['status']) {
            session()->flash('eliminado', 'El servicio ha sido eliminado exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        
        return redirect()->route('servicios.index');
    }
}
