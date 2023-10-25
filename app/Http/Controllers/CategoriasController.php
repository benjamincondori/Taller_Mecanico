<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/categorias');
        $data = $response->json();
        return view('dashboard.categorias.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/categorias');
        $categorias = $response->json();
        return view('dashboard.categorias.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:2|max:100'
        ]);

        $url =  env('URL_SERVER_API', 'http://127.0.0.1:8000'); 
        if($request->input('categoria_id') == -1){
            $response = Http::post($url.'/categorias',[
                'nombre' => $request->input('nombre'),
            ]);
        }else{
            $response = Http::post($url.'/categorias',[
                'nombre' => $request->input('nombre'),
                'categoria_id' => $request->input('categoria_id')
            ]);
        }

        $result = $response->json();
        if ($result && $result['status']) {
            alert()->success('¡Guardado!','El cliente ha sido guardado exitosamente.');
            return redirect()->route('categorias.index');
        } else {
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('categorias.create');
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
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/categorias/'.$id);
        $categoria_editar = $response->json();

        $idpadre=$categoria_editar['categoria_id'];
            if (!$idpadre){
                $categoria_padre = null;
            }else{
                $response = Http::get($url.'/categorias/'.$idpadre);
                $categoria_padre = $response->json();
            }
        
        $response = Http::get($url.'/categorias');
        $categorias = $response->json();
        return view('dashboard.categorias.edit',compact('categoria_editar','categorias','categoria_padre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|min:2|max:100'
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');

        if($request->input('categoria_id') == -1){
            $response = Http::put($url.'/categorias/'.$id,[
                'nombre' => $request->input('nombre'),
            ]);
        }else{
            $response = Http::put($url.'/categorias/'.$id,[
                'nombre' => $request->input('nombre'),
                'categoria_id' => $request->input('categoria_id')
            ]);
        }
        
        $result = $response->json();

        if ($result && $result['status'] ) {
            alert()->success('¡Actualizado!','El cliente ha sido actualizado exitosamente.');
            return redirect()->route('categorias.index');
        } else {
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('categorias.edit', $id);
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
