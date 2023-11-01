<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RolesController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/roles');
        $data = $response->json();
        return view('dashboard.roles.index', compact('data'));
    }


    public function create()
    {
        return view('dashboard.roles.create');
    }


    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
            'descripcion' => 'required|string|min:2|max:100',
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/roles', [
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);

        $result = $response->json();
        if ($result && $result['status']) {

            $descripcion = 'Rol creado con el id: ' . $result['rol']['id'];
            registrarBitacora($descripcion);

            session()->flash('guardado', '¡Guardado! El rol ha sido guardado exitosamente.');
            return redirect()->route('roles.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->back();
            // return redirect()->route('cargo.create');
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/roles/' . $id);
        $rol = $response->json();
        return view('dashboard.roles.edit', compact('rol'));
    }


    public function update(Request $request, string $id)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
            'descripcion' => 'required|string|min:2|max:100',
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url . '/roles/' . $id, [
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);

        $result = $response->json();
        if ($result && $result['status']) {

            $descripcion = 'Rol actualizado con el id: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('actualizado', 'El rol ha sido actualizado exitosamente.');
            return redirect()->route('roles.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('roles.edit', $id);
        }
    }


    public function destroy(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url . '/roles/' . $id);
        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Rol eliminado con el id: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('eliminado', 'El rol ha sido eliminado exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('roles.index');
    }
}
