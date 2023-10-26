<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/servicios');
        $data = $response->json();
        return view('dashboard.servicios.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/categorias');
        $categorias = $response->json();

        return view('dashboard.servicios.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
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
            alert()->success('¡Guardado!','El servicio ha sido guardado exitosamente.');
            return redirect()->route('servicios.index');
        } else {
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('servicios.create');
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
        $response = Http::get($url.'/servicios/'.$id);
        $servicio_editar = $response->json();
        
        $response = Http::get($url.'/categorias');
        $categorias = $response->json();

        $ids_categorias = array_column($categorias,'id');  //especificamos la columna que nos interesa buscar
        $indice_categoria_servicio = array_search($servicio_editar['categoria_id'], $ids_categorias); 
        //buscamos el id de la categoria en el array de categorias, este devolvera el indice del array
        
        $categoria_servicio = $categorias[$indice_categoria_servicio];
        //almacenamos el array,tenemos la categoria a la que pertenece el servicio sin tener que hacer otra peticion http


        return view('dashboard.servicios.edit',compact('servicio_editar','categoria_servicio','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
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
            alert()->success('¡Guardado!','El servicio ha sido modificado exitosamente.');
            return redirect()->route('servicios.index');
        } else {
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('servicios.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url.'/servicios/'.$id);

        $result = $response->json();
        if ($result && $result['status']) {
            alert()->success('Eliminado!','El servicio ha sido eliminado exitosamente.');
        } else {
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('servicios.index');
    }
}
