<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

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

    // Genera el reporte de ordenes de trabajo en pdf
    public function generarReporteOrdenes($id_empleado, $id_cliente, $id_mecanico, $estado, $id_servicio, $id_producto, $fechaDesde, $fechaHasta)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/reportes-orden-trabajos', [
            'id_empleado' => $id_empleado,
            'id_cliente' => $id_cliente,
            'id_mecanico' => $id_mecanico,
            'estado' => $estado,
            'id_servicio' => $id_servicio,
            'id_producto' => $id_producto,
            'fechaDesde' => $fechaDesde,
            'fechaHasta' => $fechaHasta
        ]);
        $data = $response->json();
        $ordenes = $data['ordenes'];

        $empleado = null;
        $cliente = null;
        $mecanico = null;
        $servicio = null;
        $producto = null;

        if ($id_empleado != 0) {
            $responseEmpleado = Http::get($url . '/empleados/' . $id_empleado);
            $empleado = $responseEmpleado->json();
        }
        if ($id_cliente != 0) {
            $responseCliente = Http::get($url . '/clientes/' . $id_cliente);
            $cliente = $responseCliente->json();
        }
        if ($id_mecanico != 0) {
            $responseMecanico = Http::get($url . '/empleados/' . $id_mecanico);
            $mecanico = $responseMecanico->json();
        }
        if ($id_servicio != 0) {
            $responseServicio = Http::get($url . '/servicios/' . $id_servicio);
            $servicio = $responseServicio->json();
        }
        if ($id_producto != 0) {
            $responseProducto = Http::get($url . '/productos/' . $id_producto);
            $producto = $responseProducto->json();
        }

        // dd($ordenes);

        // return view('dashboard.reportesPdf.reporte_ordenes_pdf', compact('data', 'empleado', 'cliente', 'mecanico', 'servicio', 'producto', 'estado', 'fechaDesde', 'fechaHasta'));

        $pdf = Pdf::loadView('dashboard.reportesPdf.reporte_ordenes_pdf', compact('ordenes', 'empleado', 'cliente', 'mecanico', 'servicio', 'producto', 'estado', 'fechaDesde', 'fechaHasta'));
        $pdf->setPaper('a4', 'landscape'); // Opcional: Configurar el tamaño y orientación del papel

        // dd($empleado, $cliente, $mecanico, $servicio, $producto, $estado, $data);

        $descripcion = 'Se generó un reporte de Ordenes de trabajo';
        registrarBitacora($descripcion);

        // Descargar o mostrar el PDF
        return $pdf->stream('reporte_orden_trabajo.pdf');
    }

    public function reporteCotizaciones()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $responseEmpleados = Http::get($url . '/empleados');
        $empleados = $responseEmpleados->json();

        $administrativos = array_filter($empleados, function ($empleado) {
            return isset($empleado['usuario']['rol']['nombre']) && $empleado['usuario']['rol']['nombre'] !== 'Mecánico';
        });

        $responseClientes = Http::get($url . '/clientes');
        $clientes = $responseClientes->json();

        $responseMarcas = Http::get($url . '/marcas');
        $marcas = $responseMarcas->json();

        $responseModelos = Http::get($url . '/modelos');
        $modelos = $responseModelos->json();

        $responseTipos= Http::get($url . '/tipo-vehiculos');
        $tipoVehiculos = $responseTipos->json();

        $responseServicios = Http::get($url . '/servicios');
        $servicios = $responseServicios->json();

        $responseProductos = Http::get($url . '/productos');
        $productos = $responseProductos->json();

        return view('dashboard.reportes.reporte_cotizaciones', compact('administrativos', 'clientes', 'marcas', 'modelos', 'tipoVehiculos', 'servicios', 'productos'));
    }

    // Genera el reporte de cotizaciones en pdf
    public function generarReporteCotizaciones($id_empleado, $id_cliente, $id_marca, $id_modelo, $id_tipo_vehiculo, $id_servicio, $id_producto, $fechaDesde, $fechaHasta)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/reportes-cotizacion', [
            'id_empleado' => $id_empleado,
            'id_cliente' => $id_cliente,
            'id_marca' => $id_marca,
            'id_modelo' => $id_modelo,
            'id_tipo_vehiculo' => $id_tipo_vehiculo,
            'id_servicio' => $id_servicio,
            'id_producto' => $id_producto,
            'fechaDesde' => $fechaDesde,
            'fechaHasta' => $fechaHasta
        ]);
        $data = $response->json();
        $cotizaciones = $data['cotizaciones'];

        $empleado = null;
        $cliente = null;
        $marca = null;
        $modelo = null;
        $tipoVehiculo = null;
        $servicio = null;
        $producto = null;

        if ($id_empleado != 0) {
            $responseEmpleado = Http::get($url . '/empleados/' . $id_empleado);
            $empleado = $responseEmpleado->json();
        }
        if ($id_cliente != 0) {
            $responseCliente = Http::get($url . '/clientes/' . $id_cliente);
            $cliente = $responseCliente->json();
        }
        if ($id_marca != 0) {
            $responseMarca = Http::get($url . '/marcas/' . $id_marca);
            $mecanico = $responseMarca->json();
        }
        if ($id_modelo != 0) {
            $responseModelo = Http::get($url . '/modelos/' . $id_modelo);
            $modelo = $responseModelo->json();
        }
        if ($id_tipo_vehiculo != 0) {
            $responseTipoVehiculo = Http::get($url . '/tipo-vehiculos/' . $id_tipo_vehiculo);
            $tipoVehiculo = $responseTipoVehiculo->json();
        }
        if ($id_servicio != 0) {
            $responseServicio = Http::get($url . '/servicios/' . $id_servicio);
            $servicio = $responseServicio->json();
        }
        if ($id_producto != 0) {
            $responseProducto = Http::get($url . '/productos/' . $id_producto);
            $producto = $responseProducto->json();
        }

        $pdf = Pdf::loadView('dashboard.reportesPdf.reporte_cotizaciones_pdf', compact('cotizaciones', 'empleado', 'cliente', 'marca', 'modelo', 'tipoVehiculo', 'servicio', 'producto', 'fechaDesde', 'fechaHasta'));
        $pdf->setPaper('a4', 'landscape'); // Opcional: Configurar el tamaño y orientación del papel

        // dd($empleado, $cliente, $mecanico, $servicio, $producto, $estado, $data);

        $descripcion = 'Se generó un reporte de Cotizaciones';
        registrarBitacora($descripcion);

        // Descargar o mostrar el PDF
        return $pdf->stream('reporte_cotizacion.pdf');
    }


    public function reportePagos()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $responseEmpleados = Http::get($url . '/empleados');
        $empleados = $responseEmpleados->json();

        $administrativos = array_filter($empleados, function ($empleado) {
            return isset($empleado['usuario']['rol']['nombre']) && $empleado['usuario']['rol']['nombre'] !== 'Mecánico';
        });

        $responseClientes = Http::get($url . '/clientes');
        $clientes = $responseClientes->json();

        return view('dashboard.reportes.reporte_pagos', compact('administrativos', 'clientes'));
    }

    // Genera el reporte de pagos en pdf
    public function generarReportePagos($id_empleado, $id_cliente, $estado, $concepto, $fechaDesde, $fechaHasta)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url . '/reportes-pagos', [
            'id_empleado' => $id_empleado,
            'id_cliente' => $id_cliente,
            'estado' => $estado,
            'concepto' => $concepto,
            'fechaDesde' => $fechaDesde,
            'fechaHasta' => $fechaHasta
        ]);
        $data = $response->json();
        $pagos = $data['pagos'];

        $montoTotal = collect($pagos)->sum('monto');
        $empleado = null;
        $cliente = null;

        if ($id_empleado != 0) {
            $responseEmpleado = Http::get($url . '/empleados/' . $id_empleado);
            $empleado = $responseEmpleado->json();
        }
        if ($id_cliente != 0) {
            $responseCliente = Http::get($url . '/clientes/' . $id_cliente);
            $cliente = $responseCliente->json();
        }

        // dd($id_empleado, $id_cliente, $estado, $concepto, $fechaDesde, $fechaHasta, $montoTotal);

        $pdf = Pdf::loadView('dashboard.reportesPdf.reporte_pagos_pdf', compact('pagos', 'empleado', 'cliente', 'estado', 'concepto', 'fechaDesde', 'fechaHasta', 'montoTotal'));
        $pdf->setPaper('a4', 'landscape'); // Opcional: Configurar el tamaño y orientación del papel

        // dd($empleado, $cliente, $mecanico, $servicio, $producto, $estado, $data);

        $descripcion = 'Se generó un reporte de Pagos';
        registrarBitacora($descripcion);

        // Descargar o mostrar el PDF
        return $pdf->stream('reporte_pagos.pdf');
    }

}
