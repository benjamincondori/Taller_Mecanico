<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PersonalController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/empleados');
        $data = $response->json();

        // Modificar la información del puesto
        foreach ($data as $key => $personal) {
            $responsePuesto = Http::get($url . '/puestos/' . $personal['puesto_id']);
            $dataPuesto = $responsePuesto->json();
            $data[$key]['puesto'] = $dataPuesto;
        }

        return view('dashboard.personal.index', compact('data'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/puestos');
        $puestos = $response->json();
        $response = Http::get($url . '/roles');
        $roles = $response->json();

        return view('dashboard.personal.create', compact('puestos', 'roles'));
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'ci' => 'required',
            'nombre' => 'required|string|min:2|max:100',
            'apellido' => 'required|string|min:2|max:100',
            'telefono' => 'required',
            'direccion' => 'required',
            'genero' => 'required|max:1',
            'email' => 'required|string|email|max:100',
            'puesto_id' => 'required',
            'rol_id' => 'required',
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/empleados', [
            'ci' => $request->input('ci'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'direccion' => $request->input('direccion'),
            'genero' => $request->input('genero'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
            'puesto_id' => $request->input('puesto_id'),
            'rol_id' => $request->input('rol_id'),
        ]);

        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Personal creado con el id: ' . $result['empleado']['id'];
            registrarBitacora($descripcion);

            session()->flash('guardado', 'El personal se ha guardado correctamente');
            return redirect()->route('personal.index');
        } else {
            session()->flash('error', 'El personal no se ha guardado correctamente');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/empleados/' . $id);
        $personal = $response->json();

        $response = Http::get($url . '/puestos');
        $puestos = $response->json();

        $response = Http::get($url . '/roles');
        $roles = $response->json();

        return view('dashboard.personal.edit', compact('personal', 'puestos', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ci' => 'required',
            'nombre' => 'required|string|min:2|max:100',
            'apellido' => 'required|string|min:2|max:100',
            'telefono' => 'required',
            'direccion' => 'required',
            'genero' => 'required|max:1',
            'email' => 'required|string|email|max:100',
            'puesto_id' => 'required',
            'rol_id' => 'required',
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url . '/empleados/' . $id, [
            'ci' => $request->input('ci'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'direccion' => $request->input('direccion'),
            'genero' => $request->input('genero'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
            'puesto_id' => $request->input('puesto_id'),
            'rol_id' => $request->input('rol_id'),
        ]);

        $result = $response->json();
        if ($result && $result['status']) {

            $descripcion = 'Personal actualizado con el id: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('actualizado', 'El personal se ha actualizado correctamente');
            return redirect()->route('personal.index');
        } else {
            session()->flash('error', 'El personal no se ha actualizado correctamente');
            return redirect()->route('personal.index', $id);
            // return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url . '/empleados/' . $id);
        $result = $response->json();
        if ($result && $result['status']) {

            $descripcion = 'Personal eliminado con el id: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('eliminado', 'El personal se ha eliminado correctamente');
        } else {
            session()->flash('error', 'El personal no se ha eliminado correctamente');
        }
        return redirect()->route('personal.index');
    }
}
