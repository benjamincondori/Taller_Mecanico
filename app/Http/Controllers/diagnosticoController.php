<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class diagnosticoController extends Controller
{
    public function index(){
        return view('dashboard.diagnostico.index');
    }
}
