<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tipovehiculoController extends Controller
{
    public function index(){
        return view('dashboard.tipovehiculo.index');
    }
}
