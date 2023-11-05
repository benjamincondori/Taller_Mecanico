<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/cotizaciones');
        $cotizaciones = $response->json();

        $cotizacionesConNombreCliente = collect();

        foreach ($cotizaciones as $cotizacion) {
            $clienteId = $cotizacion['cliente_id'];
            $responseCliente = Http::get($url . '/clientes/' . $clienteId);
            $cliente = $responseCliente->json();

            $cotizacion['cliente_nombre'] = $cliente['nombre'];
            $cotizacion['cliente_apellido'] = $cliente['apellido'];
            $cotizacionesConNombreCliente->push($cotizacion);
        }

        return view('dashboard.cotizacion.index', compact('cotizacionesConNombreCliente'));
    }
    

    public function create(Request $request, $id)
    {
        $cotizaciones = $this->getCotizaciones();
        $clientes = $this->getClientes();
        $vehiculos = $this->getVehiculos();
        $productos = $this->getProductos();
        $servicios = $this->getServicios();
        //$id = $request->input('id');
        // return $id;
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/cotizaciones/' . $id);

        $cliente = $response->json();
        //return $cliente;


        return view('dashboard.cotizacion.create', compact('id', 'clientes', 'vehiculos', 'productos', 'servicios'));
    }

    public function new()
    {
        $clientes = $this->getClientes();
        $vehiculos = $this->getVehiculos();

        return view('dashboard.cotizacion.new', compact('clientes', 'vehiculos'));
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'fecha' => 'required',
            'precio' => 'required',
            'descripcion' => 'required|string',
            'cliente' => 'required|string',
            'vehiculo' => 'required|string',
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/cotizaciones', [

            'fecha' => $request->input('fecha'),
            'precioTotal' => $request->input('precio'),
            'descripcion' => $request->input('descripcion'),
            'cliente' => $request->input('cliente'),
            'vehiculo' => $request->input('vehiculo'),

        ]);
        $result = $response->json();

        if ($result && $result['status']) {
            session()->flash('guardado', 'Ahora a registrar los datos.');
            return redirect()->route('cotizacion.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('cotizacion.new');
        }
    }

    public function show($id)
    {
        // Aquí deberías implementar la lógica para mostrar detalles de la cotización
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'precioTotal' => 'required',
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url . '/cotizaciones/' . $id, [
            'precioTotal' => $request->input('precioTotal'),
        ]);

        $result = $response->json();

        if ($result && $result['status']) {
            session()->flash('actualizado', 'Cotizacion actualizada exitosamente.');
            return redirect()->route('cotizacion.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('cotizacion.create', compact('id'));
        }
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');

        $response = Http::delete($url . '/cotizaciones/' . $id);
        $result = $response->json();

        if ($result && $result['status']) {
            session()->flash('eliminado', 'Cotizacion eliminada exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('cotizacion.index');
    }

    private function getCotizaciones()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/cotizaciones');
        return $response->json();
    }
    private function getClientes()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/clientes');
        return $response->json();
    }

    private function getProductos()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/productos');
        return $response->json();
    }

    private function getServicios()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/servicios');
        return $response->json();
    }

    private function getVehiculos()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/vehiculos');
        $vehiculos = $response->json();

        // Itera sobre los vehículos y busca el modelo y la marca correspondientes.
        foreach ($vehiculos as &$vehiculo) {
            $modeloId = $vehiculo['modelo_id'];
            $marcaId = $vehiculo['marca_id'];

            // Obtiene los detalles del modelo y la marca.
            $modeloResponse = Http::get($url . '/modelos/' . $modeloId);
            $marcaResponse = Http::get($url . '/marcas/' . $marcaId);

            $modelo = $modeloResponse->json();
            $marca = $marcaResponse->json();

            // Asigna los nombres del modelo y la marca al vehículo.
            $vehiculo['modelo_nombre'] = $modelo['nombre'];
            $vehiculo['marca_nombre'] = $marca['nombre'];
        }

        return $vehiculos;
    }
}
