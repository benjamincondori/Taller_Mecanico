<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/ventas');
        $ventas = $response->json();

        return view('dashboard.ventas.index',compact('ventas'));
    }
    
    //Para crear un registro en la tabla venta,luego de eso recien añadirle productos 
    public function new(){
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $responseCliente = Http::get($url.'/clientes');
        $clientes = $responseCliente->json();

        return view('dashboard.ventas.new',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $responseVenta = Http::get($url.'/ventas/'.$id);
        $venta = $responseVenta->json();

        $responseProducto = Http::get($url.'/productos');
        $productos = $responseProducto->json();
        

        return view('dashboard.ventas.create',compact('venta','productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'cliente_id' => 'required|string'
        ]);


        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');

        $response = Http::post($url . '/ventas', [
            'monto' => '0',
            'cliente_id' => $request->input('cliente_id'),
        ]);

        $result = $response->json();
        if ($result && $result['status']) {
            $descripcion = 'Venta creada con el id: ' . $result['venta']['id'];
            registrarBitacora($descripcion);

            session()->flash('guardado', 'Ahora a registrar Productos.');
            return redirect()->route('ventas.create',$result['venta']['id']);
            // return redirect()->route('ventas.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('ventas.new');
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
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url.'/ventas/'.$id);

        $result = $response->json();
        
        if ($result && $result['status']) {
            session()->flash('eliminado', 'Venta eliminada exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('ventas.index');
    }
}
