<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

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
            'password' => 'required|string|min:6',
        ]);

        $response = Http::post($url.'/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $token = $data['token'];

            // Almacena el token JWT en la sesión o en una cookie, según tus necesidades
            // $this->guardarTokenLocalStorage($data);

            return redirect('/dashboard');
        } else {
            $errorMessage = $response->json('error');
            // dd($errorMessage);

            // Muestra el mensaje de error en la vista
            return back()->with('error', $errorMessage);
        }

    }

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
