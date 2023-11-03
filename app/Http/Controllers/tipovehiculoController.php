<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class tipovehiculoController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/tipo-vehiculos');
        $data = $response->json();
        return view('dashboard.tipovehiculo.index', compact('data'));
    }

    public function create()
    {
        if (!verificarPermiso('Agregar_TiposVehiculos')) {
            session()->flash('accesoDenegado');
            return redirect()->back();
        }

        return view('dashboard.tipovehiculo.create');
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/tipo-vehiculos', [
            'nombre' => $request->input('nombre'),
        ]);

        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Tipo de vehiculo creado con el ID: ' . $result['tipoVehiculo']['id'];
            registrarBitacora($descripcion);

            session()->flash('guardado', 'El tipo de vehiculo ha sido guardado exitosamente.');
            return redirect()->route('tipovehiculo.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        if (!verificarPermiso('Editar_TiposVehiculos')) {
            session()->flash('accesoDenegado');
            return redirect()->back();
        }

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/tipo-vehiculos/' . $id);
        $tipovehiculo = $response->json();
        return view('dashboard.tipovehiculo.edit', compact('tipovehiculo'));
    }

    public function update(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url . '/tipo-vehiculos/' . $id, [
            'nombre' => $request->input('nombre'),
        ]);

        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Tipo de vehiculo actualizado con el ID: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('actualizado', 'El tipo de vehiculo ha sido actualizado exitosamente.');
            return redirect()->route('tipovehiculo.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('tipovehiculo.edit', $id);
        }
    }

    public function destroy($id)
    {
        if (!verificarPermiso('Eliminar_TiposVehiculos')) {
            session()->flash('accesoDenegado');
            return redirect()->back();
        }

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url . '/tipo-vehiculos/' . $id);
        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Tipo de vehiculo eliminado con el ID: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('eliminado', 'El tipo de vehiculo ha sido eliminado exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }

        return redirect()->route('tipovehiculo.index');
    }
}
