<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VehiculoController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/vehiculos');
        $vehiculos = $response->json();
        return view('dashboard.vehiculos.index', compact('vehiculos'));
    }


    public function create()
    {
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


    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required',
            'nro_chasis' => 'required',
            'color' => 'required|string',
            'año' => 'required|numeric',
            'marca_id' => 'required',
            'modelo_id' => 'required',
            'cliente_id' => 'required',
            'tipo_vehiculo_id' => 'required',
        ]);

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

            $descripcion = 'Vehículo creado con el ID: ' . $result['vehiculo']['id'];
            registrarBitacora($descripcion);

            session()->flash('guardado', 'El vehículo ha sido guardado exitosamente.');
            return redirect()->route('vehiculos.index');
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

            $descripcion = 'Vehículo actualizado con el ID: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('actualizado', 'El vehículo ha sido actualizado exitosamente.');
            return redirect()->route('vehiculos.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('vehiculos.edit', $id);
        }
    }


    public function destroy($id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url . '/vehiculos/' . $id);
        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Vehículo eliminado con el ID: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('eliminado', 'El vehículo ha sido eliminado exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('vehiculos.index');
    }
}
