<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PersonalController extends Controller
{
    public function index()
    {
        $url=env('URL_SERVER_API','http://127.0.0.1_8000');
        $response=Http::get($url.'/personal');
        $data=$response->json();
        $title='¿Está seguro?';
        $text="¡Se eliminará el personal definitivamente!";
        return view('dashboard.personal.index',compact('data'));
    }

    public function mostrar($id)
    {
        // Tu lógica aquí
    }
    public function create(){
        return view('dashboard.personal.create');
    }
    public function store(Request $request){
        $request->validate([
            'ci'=>'required',
            'nombre'=>'required|string|min:2|max:100',
            'apellido'=>'required|string|min:2|max:100',
            'telefono'=>'required',
            'direccion'=>'required',
            'genero'=>'required|max:1',
            'email'=>'required|string|email|max:100',
        ]);
        $url=env('URL_SERVER_API','http://127.0.0.1_8000');
        $response=Http::post($url.'/personal',[
            'ci'=>$request->input('ci'),
            'nombre'=>$request->input('nombre'),
            'apellido'=>$request->input('apellido'),
            'direccion'=>$request->input('direccion'),
            'genero'=>$request->input('genero'),
            'telefono'=>$request->input('telefono'),
            'email'=>$request->input('email'),
        ]);
        $result=$response->json();
        if($result && $result['status']){
            alert()->success('¡Guardado!','El personal se ha guardado correctamente');
            return redirect()->route('personal.index');
        }else{
            alert()->error('¡Error!','El personal no se ha guardado correctamente');
            return redirect()->route('personal.index');
        }
    }
    public function edit($id){
        $url=env('URL_SERVER_API','http://127.0.0.1_8000');
        $response=Http::get($url.'/personal/'.$id);
        $personal=$response->json();
        return view('dashboard.personal.edit',compact('personal'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'ci'=>'required',
            'nombre'=>'required|string|min:2|max:100',
            'apellido'=>'required|string|min:2|max:100',
            'telefono'=>'required',
            'direccion'=>'required',
            'genero'=>'required|max:1',
            'email'=>'required|string|email|max:100',
        ]);
        $url=env('URL_SERVER_API','http://127.0.0.1_8000');
        $response=Http::put($url.'/personal/'.$id,[
            'ci'=>$request->input('ci'),
            'nombre'=>$request->input('nombre'),
            'apellido'=>$request->input('apellido'),
            'direccion'=>$request->input('direccion'),
            'genero'=>$request->input('genero'),
            'telefono'=>$request->input('telefono'),
            'email'=>$request->input('email'),
        ]);
        $result=$response->json();
        if($result && $result['status']){
            alert()->success('¡Actualizado!','El personal se ha actualizado correctamente');
            return redirect()->route('personal.index');
        }else{
            alert()->error('Oops...!','Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('personal.index',$id);
        }
    }
    public function destroy($id){
        $url=env('URL_SERVER_API','http://127.0.0.1_8000');
        $response=Http::delete($url.'/personal/'.$id);
        $result=$response->json();
        if($result && $result['status']){
            alert()->success('¡Eliminado!','El personal se ha eliminado correctamente');
            return redirect()->route('personal.index');
        }else{
            alert()->error('Oops...!','Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('personal.index');
        }
    }
}