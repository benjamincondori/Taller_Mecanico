<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/usuarios');
        $data = $response->json();
        return view('dashboard.usuarios.index',compact('data'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/usuarios/' . $id);
        $usuario = $response->json();

        $response = Http::get($url . '/puestos');
        $puestos = $response->json();

        $response = Http::get($url . '/roles');
        $roles = $response->json();

        return view('dashboard.usuarios.edit', compact('usuario', 'puestos', 'roles'));
    }


    public function update(Request $request, string $id)
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

            $descripcion = 'Usuario actualizado con el id: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('actualizado', 'El personal se ha actualizado correctamente');
            return redirect()->route('usuarios.index');
        } else {
            session()->flash('error', 'El personal no se ha actualizado correctamente');
            return redirect()->route('usuarios.index', $id);
            // return redirect()->back();
        }
    }


    public function destroy(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url . '/usuarios/' . $id);
        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Usuario eliminado con el id: ' . $id;
            registrarBitacora($descripcion);
            
            session()->flash('eliminado', 'El usuario ha sido eliminado exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('usuarios.index');
    }

}
