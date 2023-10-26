<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class tipovehiculoController extends Controller
{
    public function index(){
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/tipo-vehiculos');
        $data = $response->json();
        return view('dashboard.tipovehiculo.index', compact('data'));
    }
    
    public function create(){
        return view('dashboard.tipovehiculo.create');
    }
    public function store(Request $request){
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
        ]);

        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url.'/tipo-vehiculos', [
            'nombre' => $request->input('nombre'),
        ]);
        $result= $response->json();
        if($result && $result['status']){
            alert()->success('¡Guardado!','El tipo de vehiculo ha sido guardado exitosamente.');
            return redirect()->route('tipovehiculo.index');
        }else{
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('tipovehiculo.create');
        }
    }
    public function edit($id){
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/tipo-vehiculos/'.$id);
        $tipovehiculo = $response->json();
        return view('dashboard.tipovehiculo.edit', compact('tipovehiculo'));
    }
    public function update(Request $request, $id){
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
        ]);

        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url.'/tipo-vehiculos/'.$id, [
            'nombre' => $request->input('nombre'),
        ]);
        $result= $response->json();
        if($result && $result['status']){
            alert()->success('¡Actualizado!','El tipo de vehiculo ha sido actualizado exitosamente.');
            return redirect()->route('tipovehiculo.index');
        }else{
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('tipovehiculo.edit', $id);
        }
    }
    public function destroy($id){
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url.'/tipo-vehiculos/'.$id);
        $result= $response->json();
        if($result && $result['status']){
            alert()->success('¡Eliminado!','El tipo de vehiculo ha sido eliminado exitosamente.');
        }else{
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('tipovehiculo.index');
    }
}
