<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    public function index(){
        $cotizaciones=null;
        return view('dashboard.cotizacion.index', compact('cotizaciones'));
    }

    public function create()
    {
        $clientes=null;
        $vehiculos=null;
        return view('dashboard.cotizacion.create', compact('clientes','vehiculos'));
    }
    public function store(Request $request)
    {
        
    }
}
