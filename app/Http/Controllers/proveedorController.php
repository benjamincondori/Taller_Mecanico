<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class proveedorController extends Controller
{
    public function index(){
        return view('dashboard.proveedor.index');
    }
}
