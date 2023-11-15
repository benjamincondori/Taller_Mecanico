<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class estadoVehiculoController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/EstadoVehiculo');
        $data = $response->json();
        return view('dashboard.estadovehiculo.index', compact('data'));
    }
    public function create()
    {
        if (!verificarPermiso('Agregar_EstadoVehiculo')) {
            session()->flash('accesoDenegado');
            return redirect()->back();
        }
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/vehiculos');
        $vehiculos = $response->json();
        return view('dashboard.estadovehiculo.create', compact('vehiculos'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'estado' => 'required|string',
            'descripcion' => 'required|string',
            'vehiculo_id' => 'required'
        ]);
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/EstadoVehiculo', [
            'estado' => $request->input('estado'),
            'descripcion' => $request->input('descripcion'),
            'vehiculo_id' => $request->input('vehiculo_id'),
            'fecha' => now(),
        ]);
        $result = $response->json();
        if ($result && $result['status']) {
            $descripcion = 'EstadoVehiculo creado con el ID: ' . $result['estadoVehiculo']['id'];
            registrarBitacora($descripcion);
            session()->flash('guardado', 'El Estado del vehiculo ha sido guardado exitosamente.');
            return redirect()->route('estadoVehiculo.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->back();
        }
    }
    public function getStatusColor($estado) {
        switch ($estado) {
            case 'En espera':
                return 'bg-primary text-white';
            case 'En diagnóstico':
                return 'bg-info text-white';
            case 'En reparación':
                return 'bg-warning text-dark';
            case 'En espera de repuestos':
                return 'bg-secondary text-white';
            case 'En espera de autorización':
                return 'bg-danger text-white';
            case 'Listo para entrega':
                return 'bg-success text-white';
            case 'Entregado':
                return 'bg-dark text-white';
            default:
                return 'bg-light text-dark';
        }
    }
    
    public function show($id)
    {
        if (!verificarPermiso('Ver_EstadoVehiculo')) {
            session()->flash('accesoDenegado');
            return redirect()->back();
        }
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/EstadoVehiculo/' . $id);
        $EstadoVehiculo = $response->json();
    
        $responseVehiculo = Http::get($url . '/vehiculos/' . $EstadoVehiculo['vehiculo_id']);
        $vehiculo = $responseVehiculo->json();
    
        $responseCliente = Http::get($url . '/clientes/' . $vehiculo['cliente_id']);
        $cliente = $responseCliente->json();
        $statusColor = $this->getStatusColor($EstadoVehiculo['estado']);
        return view('dashboard.estadovehiculo.show', compact('EstadoVehiculo', 'vehiculo', 'cliente','statusColor'));
    }
    
    public function edit($id)
    {
        if (!verificarPermiso('Editar_EstadoVehiculo')) {
            session()->flash('accesoDenegado');
            return redirect()->back();
        }
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/EstadoVehiculo/' . $id);
        $EstadoVehiculo = $response->json();
        $response = Http::get($url . '/vehiculos');
        $vehiculos = $response->json();
        return view('dashboard.estadovehiculo.edit', compact('EstadoVehiculo', 'vehiculos'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|string',
            'descripcion' => 'required|string',
            'vehiculo_id' => 'required'
        ]);
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url . '/EstadoVehiculo/' . $id, [
            'estado' => $request->input('estado'),
            'descripcion' => $request->input('descripcion'),
            'vehiculo_id' => $request->input('vehiculo_id'),
            'fecha' => now(),
        ]);
        $result = $response->json();
        if ($result && $result['status']) {
            $descripcion = 'Estado del Vehiculo actualizado con el ID: ' . $id;
            registrarBitacora($descripcion);
            session()->flash('actualizado', 'El Estado del Vehiculo ha sido actualizado exitosamente.');
            return redirect()->route('estadovehiculo.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('estadovehiculo.index');
        }
    }
    public function destroy($id)
    {
        if (!verificarPermiso('Eliminar_EstadoVehiculo')) {
            session()->flash('accesoDenegado');
            return redirect()->back();
        }
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url . '/EstadoVehiculo/' . $id);
        $result = $response->json();
        if ($result && $result['status']) {
            $descripcion = 'EstadoVehiculo eliminado con el ID: ' . $id;
            registrarBitacora($descripcion);
            session()->flash('eliminado', 'El estado del vehiculo ha sido eliminado exitosamente.');

        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->back();
        }
        return redirect()->route('estadovehiculo.index');
    }

}
