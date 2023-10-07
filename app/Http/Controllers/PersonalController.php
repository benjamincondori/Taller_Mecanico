<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        return view('dashboard.personal.index');
    }

    public function mostrar($id)
    {
        // Tu lógica aquí
    }
}