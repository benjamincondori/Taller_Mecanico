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
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/puestos');
        $puestos = $response->json();

        return view('dashboard.personal.create', compact('puestos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required',
            'nombre' => 'required|string|min:2|max:100',
            'apellido' => 'required|string|min:2|max:100',
            'telefono' => 'required',
            'direccion' => 'required',
            'genero' => 'required|max:1',
            'puesto_id' => 'required',
            'usuario_id' => 'required' // Validación para usuario_id
        ]);

        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/empleados', [
            'ci' => $request->input('ci'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'direccion' => $request->input('direccion'),
            'genero' => $request->input('genero'),
            'telefono' => $request->input('telefono'),
            'puesto_id' => $request->input('puesto_id'),
            'usuario_id' => $request->input('usuario_id') // Incluir usuario_id en la solicitud
        ]);

        $result = $response->json();

        if ($result && $result['status']) {
            alert()->success('¡Guardado!', 'El personal se ha guardado correctamente');
            return redirect()->route('personal.index');
        } else {
            alert()->error('¡Error!', 'El personal no se ha guardado correctamente');
            return redirect()->route('personal.create');
        }
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/empleados/' . $id);
        $personal = $response->json();

        // Obtener información del puesto
        $responsePuesto = Http::get($url . '/puestos/' . $personal['puesto_id']);
        $puesto = $responsePuesto->json();

        return view('dashboard.personal.edit', compact('personal', 'puesto'));
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
        ]);

        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url . '/empleados/' . $id, [
            'ci' => $request->input('ci'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'direccion' => $request->input('direccion'),
            'genero' => $request->input('genero'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
        ]);
        $result = $response->json();
        if ($result && $result['status']) {
            alert()->success('¡Actualizado!', 'El personal se ha actualizado correctamente');
            return redirect()->route('personal.index');
        } else {
            alert()->error('Oops...!', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('personal.index', $id);
        }
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url . '/empleados/' . $id);
        $result = $response->json();
        if ($result && $result['status']) {
            alert()->success('¡Eliminado!', 'El personal se ha eliminado correctamente');
            return redirect()->route('personal.index');
        } else {
            alert()->error('Oops...!', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('personal.index');
        }
    }
}
