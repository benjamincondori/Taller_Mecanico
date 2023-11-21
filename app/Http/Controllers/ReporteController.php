<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReporteController extends Controller
{
    public function reporteOrdenes()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $responseEmpleados = Http::get($url . '/empleados');
        $empleados = $responseEmpleados->json();

        $administrativos = array_filter($empleados, function ($empleado) {
            return isset($empleado['usuario']['rol']['nombre']) && $empleado['usuario']['rol']['nombre'] !== 'Mecánico';
        });

        $mecanicos = array_filter($empleados, function ($empleado) {
            return isset($empleado['usuario']['rol']['nombre']) && $empleado['usuario']['rol']['nombre'] === 'Mecánico';
        });

        $responseClientes = Http::get($url . '/clientes');
        $clientes = $responseClientes->json();

        $responseServicios = Http::get($url . '/servicios');
        $servicios = $responseServicios->json();

        $responseProductos = Http::get($url . '/productos');
        $productos = $responseProductos->json();

        return view('dashboard.reportes.reporte_ordenes',  compact('administrativos', 'clientes', 'mecanicos', 'servicios', 'productos'));
    }

    public function generarReporteOrdenes(Request $request)
    {
        
    }


    public function reporteCotizaciones()
    {
        return view('dashboard.reportes.reporte_cotizaciones');
    }

    public function generarReporteCotizaciones()
    {

    }


    public function reportePagos()
    {
        return view('dashboard.reportes.reporte_pagos');
    }

    public function generarReportePagos()
    {

    }



    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
