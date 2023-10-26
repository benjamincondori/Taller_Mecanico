<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $responseVehiculos = Http::get($url . '/vehiculos');
        $responseMarcas = Http::get($url . '/marcas');
        $responseModelos = Http::get($url . '/modelos');
        $responseClientes = Http::get($url . '/clientes');
        $responseTipoVehiculos = Http::get($url . '/tipo-vehiculos');

        $vehiculos = collect($responseVehiculos->json())->sortBy('id')->values()->all();
        $marcas = $responseMarcas->json();
        $modelos = $responseModelos->json();
        $clientes = $responseClientes->json();
        $tipoVehiculos = $responseTipoVehiculos->json();

        return view('dashboard.vehiculos.index', compact('vehiculos', 'marcas', 'modelos', 'clientes', 'tipoVehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $responseMarcas = Http::get($url . '/marcas');
        $responseModelos = Http::get($url . '/modelos');
        $responseClientes = Http::get($url . '/clientes');
        $responseTipoVehiculos = Http::get($url . '/tipo-vehiculos');

        $marcas = $responseMarcas->json();
        $modelos = $responseModelos->json();
        $clientes = $responseClientes->json();
        $tipoVehiculos = $responseTipoVehiculos->json();

        return view('dashboard.vehiculos.create', compact('marcas', 'modelos', 'clientes', 'tipoVehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
     public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|unique:vehiculos',
            'nro_chasis' => 'required|unique:vehiculos',
            'color' => 'required',
            'año' => 'required|numeric',
            'marca_id' => 'required',
            'modelo_id' => 'required',
            'cliente_id' => 'required',
            'tipo_vehiculo_id' => 'required',
        ]);

        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/vehiculos', [
            'placa' => $request->input('placa'),
            'nro_chasis' => $request->input('nro_chasis'),
            'color' => $request->input('color'),
            'año' => $request->input('año'),
            'marca_id' => $request->input('marca_id'),
            'modelo_id' => $request->input('modelo_id'),
            'cliente_id' => $request->input('cliente_id'),
            'tipo_vehiculo_id' => $request->input('tipo_vehiculo_id'),
        ]);

        $result = $response->json();
        if ($result && $result['status']) {
            alert()->success('¡Guardado!', 'El vehículo ha sido guardado exitosamente.');
            return redirect()->route('vehiculos.index');
        } else {
            alert()->error('Oops...', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('vehiculos.create');
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
    public function edit($id)
    {
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $responseVehiculo = Http::get($url . '/vehiculos/' . $id);
        $responseMarcas = Http::get($url . '/marcas');
        $responseModelos = Http::get($url . '/modelos');
        $responseClientes = Http::get($url . '/clientes');
        $responseTipoVehiculos = Http::get($url . '/tipo-vehiculos');

        $vehiculo = $responseVehiculo->json();
        $marcas = $responseMarcas->json();
        $modelos = $responseModelos->json();
        $clientes = $responseClientes->json();
        $tipoVehiculos = $responseTipoVehiculos->json();

        return view('dashboard.vehiculos.edit', compact('vehiculo', 'marcas', 'modelos', 'clientes', 'tipoVehiculos'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'placa' => 'required|string',
            'nro_chasis' => 'required|string',
            'color' => 'required|string',
            'año' => 'required|integer',
            'marca_id' => 'required',
            'modelo_id' => 'required',
            'cliente_id' => 'required',
            'tipo_vehiculo_id' => 'required',
        ]);

        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url . '/vehiculos/' . $id, [
            'placa' => $request->input('placa'),
            'nro_chasis' => $request->input('nro_chasis'),
            'color' => $request->input('color'),
            'año' => $request->input('año'),
            'marca_id' => $request->input('marca_id'),
            'modelo_id' => $request->input('modelo_id'),
            'cliente_id' => $request->input('cliente_id'),
            'tipo_vehiculo_id' => $request->input('tipo_vehiculo_id'),
        ]);

        $result = $response->json();

        if ($result && $result['status']) {
            alert()->success('¡Actualizado!', 'El vehículo ha sido actualizado exitosamente.');
            return redirect()->route('vehiculos.index');
        } else {
            alert()->error('Oops...', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('vehiculos.edit', $id);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url . '/vehiculos/' . $id);
        $result = $response->json();

        if ($result && $result['status']) {
            alert()->success('¡Eliminado!', 'El vehículo ha sido eliminado exitosamente.');
        } else {
            alert()->error('Oops...', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('vehiculos.index');
    }

}
