<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        return view('dashboard.personal.cargo.index');
    }

    public function mostrar($id)
    {
        // Tu lógica aquí
    }
}
