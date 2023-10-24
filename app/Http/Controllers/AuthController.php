<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function login(Request $request)
    {
        $url = env('URL_SERVER_API');

        // Validación de datos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $response = Http::post($url.'/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $usuario = $data['usuario'];

            Session::regenerate();
            Session::put('usuario', $usuario);

            return redirect()->route('dashboard');

        } else {
            return back()->withErrors([
                'email' => 'Las credenciales proporcionadas no son válidas.',
            ])->onlyInput('email');
        }

    }


    // public function login(Request $request)
    // {
    //     $url = env('URL_SERVER_API');

    //     // Validación de datos
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|string',
    //     ]);

    //     $response = Http::post($url.'/login', [
    //         'email' => $request->input('email'),
    //         'password' => $request->input('password'),
    //     ]);

    //     if ($response->successful()) {
    //         $data = $response->json();
    //         // $token = $data['token'];

    //         return redirect('/dashboard');
    //     } else {
    //         $errorMessage = $response->json('error');
    //         // dd($errorMessage);

    //         // Muestra el mensaje de error en la vista
    //         return back()->with('error', $errorMessage);
    //     }

    // }

    public function logout() {

    }

    public function profile() {
        $url = env('URL_SERVER_API');
        $response = Http::get($url.'/profile');
        $data = $response->json();
    }


    // private function guardarTokenLocalStorage($data) {
    //     // Almacena el token JWT en el localStorage
    //     $token = $data['token'];
    //     "<script>
    //             localStorage.setItem('token', '$token');
    //           </script>";
    // }
}
