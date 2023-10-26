<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

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

        $data = $response->json();

        if (isset($data) && $data['status']) {
            $usuario = $data['usuario'];
            $rol_id = $data['usuario']['rol_id'];
        }

        if ($response->successful() && isset($rol_id) &&  $rol_id !== 4) {

            Session::regenerate();
            Session::put('usuario', $usuario);

            return redirect()->route('dashboard');

        } else {
            return back()->withErrors([
                'email' => 'Las credenciales proporcionadas no son válidas.',
            ])->onlyInput('email');
        }

    }


    public function logout() {

        session()->flush();
        session()->forget('usuario');

        return redirect('/');
    }

    public function profile() {
        $url = env('URL_SERVER_API');
        $response = Http::get($url.'/profile');
        $data = $response->json();
    }

}
