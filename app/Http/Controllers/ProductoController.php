<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/productos');
        $data = $response->json();

        return view('dashboard.productos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/categorias');
        $categorias = $response->json();

        $response = Http::get($url.'/proveedores');
        $proveedores = $response->json();

        return view('dashboard.productos.create', compact('categorias', 'proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
            'descripcion' => 'nullable|string',
            // 'imagen' => 'required|dimensions:min_width=100,min_height=200',
            'picture' => 'nullable|mimes:png,jpg,jpeg|max:10240',
            'stock_disponible' => 'required|integer',
            'stock_minimo' => 'required|integer',
            'precio_venta' => 'required|numeric',
            'precio_compra' => 'required|numeric',
            'categoria_id' => 'required|integer',
            'proveedor_id' => 'required|integer'
        ]);

        // dd($request);
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url.'/productos', [
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            // 'picture' => $request->input('picture'),
            'stock_disponible' => $request->input('stock_disponible'),
            'stock_minimo' => $request->input('stock_minimo'),
            'precio_venta' => $request->input('precio_venta'),
            'precio_compra' => $request->input('precio_compra'),
            'categoria_id' => $request->input('categoria_id'),
            'proveedor_id' => $request->input('proveedor_id'),
        ]);

        dd($response);

        $result = $response->json();
        if ($result && $result['status']) {
            alert()->success('¡Guardado!','El producto ha sido guardado exitosamente.');
            return redirect()->route('productos.index');
        } else {
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('productos.create');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
