<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class proveedorController extends Controller
{
    public function index(){
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response=Http::get($url.'/proveedores');
        $data=$response->json();
        return view('dashboard.proveedor.index',compact('data'));
    }
    public function create(){
        return view('dashboard.proveedor.create');
    }
    public function store(Request $request){
        $request->validate([
            'nombre'=>'required|string|min:2|max:100',
            'direccion'=>'required|string|min:2|max:100',
            'telefono'=>'required|string|min:2|max:100',
            'email'=>'required|string|min:2|max:100',
        ]);
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response=Http::post($url.'/proveedores',[
            'nombre'=>$request->input('nombre'),
            'direccion'=>$request->input('direccion'),
            'telefono'=>$request->input('telefono'),
            'email'=>$request->input('email'),
        ]);
        $result=$response->json();
        if($result && $result['status']){
            alert()->success('¡Guardado!','El proveedor ha sido guardado exitosamente.');
            return redirect()->route('proveedor.index');
        }else{
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('proveedor.create');
        }
    }
    public function edit($id){
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response=Http::get($url.'/proveedores/'.$id);
        $proveedor=$response->json();
        return view('dashboard.proveedor.edit',compact('proveedor'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'nombre'=>'required|string|min:2|max:100',
            'direccion'=>'required|string|min:2|max:100',
            'telefono'=>'required|string|min:2|max:100',
            'email'=>'required|string|min:2|max:100',
        ]);
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response=Http::put($url.'/proveedores/'.$id,[
            'nombre'=>$request->input('nombre'),
            'direccion'=>$request->input('direccion'),
            'telefono'=>$request->input('telefono'),
            'email'=>$request->input('email'),
        ]);
        $result=$response->json();
        if($result && $result['status']){
            alert()->success('¡Guardado!','El proveedor ha sido guardado exitosamente.');
            return redirect()->route('proveedor.index');
        }else{
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('proveedor.create',$id);
        }
    }
    public function destroy($id){
        $url = env('URL_SERVER_API_LOCAL', 'http://127.0.0.1:8000');
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response=Http::delete($url.'/proveedores/'.$id);
        $result=$response->json();
        if($result && $result['status']){
            alert()->success('¡Eliminado!','El proveedor ha sido eliminado exitosamente.');
        }else{
            alert()->error('Oops...','Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('proveedor.index');
    }

}
