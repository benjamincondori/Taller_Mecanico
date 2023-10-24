<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bitacoraController extends Controller
{
    public function index(){
        return view('dashboard.bitacora.index');
    }
}
