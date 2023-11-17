<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrdenTrabajoController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/orden-trabajos');
        $data = $response->json();
        return view('dashboard.orden_trabajo.index', compact('data'));
    }


    public function create()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/empleados');
        $empleados = $response->json();

        // Filtrar empleados que tienen el rol de "Mecánico"
        $mecanicos = array_filter($empleados, function ($empleado) {
            return isset($empleado['usuario']['rol']['nombre']) && $empleado['usuario']['rol']['nombre'] === 'Mecánico';
        });

        $response = Http::get($url . '/cotizaciones');
        $cotizaciones = $response->json();
        $cotizaciones = collect($cotizaciones)->sortBy('id')->all();

        return view('dashboard.orden_trabajo.create', compact('mecanicos', 'cotizaciones'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'fechaIngreso' => 'required',
            'fechaEgreso' => 'required',
            'mecanico_id' => 'required',
            'cotizacion_id' => 'required',
        ]);

        $fecha = Carbon::now()->format('Y-m-d H:i:s');
        $fecha_inicio = transformarFormatoFecha($request->input('fechaIngreso'));
        $fecha_fin = transformarFormatoFecha($request->input('fechaEgreso'));

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/orden-trabajos', [
            'descripcion' => $request->input('descripcion'),
            'empleado_id' => $request->input('mecanico_id'),
            'cotizacion_id' => $request->input('cotizacion_id'),
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
            'fecha_creacion' =>  $fecha,
            'estado' => 'Ingresado',
            'descuento' => $request->input('descuento'),
            'costo_total' => $request->input('costo_total')
        ]);

        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Orden de trabajo creado con el ID: ' . $result['ordenDeTrabajo']['id'];
            registrarBitacora($descripcion);

            session()->flash('guardado', 'La orden de trabajo ha sido guardado exitosamente.');
            return redirect()->route('ordentrabajo.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->back();
        }
    }


    public function show(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/orden-trabajos/' . $id);
        $ordenTrabajo = $response->json();
        
        $productos = $ordenTrabajo['cotizacion']['productos'];
        $servicios = $ordenTrabajo['cotizacion']['servicios'];
        
        return view('dashboard.orden_trabajo.show', compact('ordenTrabajo', 'productos', 'servicios'));
    }


    public function edit(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/orden-trabajos/' . $id);
        $ordenTrabajo = $response->json();

        $response = Http::get($url . '/empleados');
        $empleados = $response->json();

        // Filtrar empleados que tienen el rol de "Mecánico"
        $mecanicos = array_filter($empleados, function ($empleado) {
            return isset($empleado['usuario']['rol']['nombre']) && $empleado['usuario']['rol']['nombre'] === 'Mecánico';
        });

        $response = Http::get($url . '/cotizaciones');
        $cotizaciones = $response->json();
        $cotizaciones = collect($cotizaciones)->sortBy('id')->all();

        return view('dashboard.orden_trabajo.edit', compact('ordenTrabajo', 'mecanicos', 'cotizaciones'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'fechaIngreso' => 'required',
            'fechaEgreso' => 'required',
            'mecanico_id' => 'required',
            'cotizacion_id' => 'required',
            'estado' => 'required'
        ]);

        $fecha = Carbon::now()->format('Y-m-d H:i:s');
        $fecha_inicio = transformarFormatoFecha($request->input('fechaIngreso'));
        $fecha_fin = transformarFormatoFecha($request->input('fechaEgreso'));

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url . '/orden-trabajos/' . $id, [
            'descripcion' => $request->input('descripcion'),
            'empleado_id' => $request->input('mecanico_id'),
            'cotizacion_id' => $request->input('cotizacion_id'),
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
            'fecha_creacion' =>  $fecha,
            'estado' => $request->input('estado'),
            'descuento' => $request->input('descuento'),
            'costo_total' => $request->input('costo_total')
        ]);

        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Orden de trabajo actualizado con el ID: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('actualizado', 'La orden de trabajo ha sido actualizado exitosamente.');
            return redirect()->route('ordentrabajo.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->back();
        }
    }


    public function destroy(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');

        $response = Http::delete($url . '/orden-trabajos/' . $id);
        $result = $response->json();
        if ($result && $result['status']) {
            session()->flash('eliminado', 'Orden de trabajo eliminada exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('ordentrabajo.index');
    }
}
