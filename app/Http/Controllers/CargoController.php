<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CargoController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/puestos');
        $data = $response->json();
        return view('dashboard.cargo.index', compact('data'));
    }

    public function show($id)
    {
        // Tu lógica aquí
    }

    public function create()
    {
        return view('dashboard.cargo.create');
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
            'descripcion' => 'required|string|min:2|max:100',
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/puestos', [
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);
        $result = $response->json();
        if ($result && $result['status']) {

            $descripcion = 'Cargo creado con el id: ' . $result['puesto']['id'];
            registrarBitacora($descripcion);

            session()->flash('guardado', '¡Guardado! El cargo ha sido guardado exitosamente.');
            return redirect()->route('cargo.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->back();
            // return redirect()->route('cargo.create');
        }
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/puestos/' . $id);
        $cargo = $response->json();
        return view('dashboard.cargo.edit', compact('cargo'));
    }

    public function update(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
            'descripcion' => 'required|string|min:2|max:100',
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url . '/puestos/' . $id, [
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);

        $result = $response->json();
        if ($result && $result['status']) {

            $descripcion = 'Cargo actualizado con el id: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('actualizado', 'El cargo ha sido actualizado exitosamente.');
            return redirect()->route('cargo.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('cargo.edit', $id);
        }
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url . '/puestos/' . $id);
        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Cargo eliminado con el id: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('eliminado', 'El cargo ha sido eliminado exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('cargo.index');
    }
}
