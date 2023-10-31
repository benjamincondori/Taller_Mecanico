<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoriasController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/categorias');
        $data = $response->json();
        return view('dashboard.categorias.index', compact('data'));
    }


    public function create()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/categorias');
        $categorias = $response->json();
        return view('dashboard.categorias.create', compact('categorias'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
            'categoria_id' => 'required'
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/categorias', [
            'nombre' => $request->input('nombre'),
            'categoria_id' => $request->input('categoria_id')
        ]);

        $result = $response->json();

        if ($result && $result['status']) {
            session()->flash('guardado', 'La categoría ha sido guardado exitosamente.');
            return redirect()->route('categorias.index');
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
        $response = Http::get($url . '/categorias/' . $id);
        $categoria = $response->json();
        return view('dashboard.categorias.edit', compact('categoria'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|min:2|max:100'
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');

        // if ($request->input('categoria_id') == -1) {
        //     $response = Http::put($url . '/categorias/' . $id, [
        //         'nombre' => $request->input('nombre'),
        //     ]);
        // } else {
            $response = Http::put($url . '/categorias/' . $id, [
                'nombre' => $request->input('nombre'),
                'categoria_id' => $request->input('categoria_id')
            ]);
        // }

        $result = $response->json();

        if ($result && $result['status']) {
            session()->flash('actualizado', 'La categoría ha sido actualizado exitosamente.');
            return redirect()->route('categorias.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('categorias.edit', $id);
        }
    }


    public function destroy(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url . '/categorias/' . $id);
        $result = $response->json();

        if ($result && $result['status']) {
            session()->flash('eliminado', 'La Categoria ha sido eliminado exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('categorias.index');
    }
}
