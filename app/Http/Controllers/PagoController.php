<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/pagos');
        $pagos = $response->json();

        return view('dashboard.pagos.index', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/pagos');
        $pagos = $response->json();

        $pagos = array_filter($pagos, function ($pago) {
            return isset($pago) && !$pago['estado'];
        });

        return view('dashboard.pagos.create', compact('pagos'));
    }

    public function createPago(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/pagos/'.$id);
        $pago = $response->json();

        $pagoId = $pago['id'];
        $response = Http::get($url . '/orden-trabajos/' . $pagoId);
        $ordenTrabajo = $response->json();

        $productos = $ordenTrabajo['cotizacion']['productos'];
        $servicios = $ordenTrabajo['cotizacion']['servicios'];

        return view('dashboard.pagos.create_pago', compact('pago', 'productos', 'servicios'));
    }

    public function createFactura(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/pagos/'.$id);
        $pago = $response->json();

        $pagoId = $pago['id'];
        $response = Http::get($url . '/orden-trabajos/' . $pagoId);
        $ordenTrabajo = $response->json();


        if($ordenTrabajo != ""){
            $productos = $ordenTrabajo['cotizacion']['productos'];
            $servicios = $ordenTrabajo['cotizacion']['servicios'];
        }else{
            $pagoId = $pago['id'];
            $response = Http::get($url . '/ventas/' . $pagoId);
            $ventas = $response->json();
            $productos = $ventas['productos'];
            $servicios = 0;
        }
        $factura = $pago['factura'];

        return view('dashboard.pagos.factura', compact('pago','factura', 'productos', 'servicios'));

        // $pdf = Pdf::loadView('dashboard.pagos.factura', compact('pago','factura', 'productos', 'servicios'));

        // $pdf->setPaper('a4', 'landscape'); // Opcional: Configurar el tamaño y orientación del papel
        // dd($pdf);

        // return $pdf->stream('factura.pdf', ['Attachment' => false]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'monto' => 'required',
            'efectivo' => 'required',
            'saldo' => 'required',
            'descripcion' => 'required|string|max:255'
        ]);

        $fecha = Carbon::now()->format('Y-m-d H:i:s');

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $factura = Http::post($url . '/facturas', [
            'fecha_emision' =>  $fecha,
            'detalle' => $request->descripcion,
            'importe' => $request->efectivo,
            'saldo' => $request->saldo,
            'monto_total' => $request->montoTotal,
        ]);

        $result = $factura->json();

        if ($result && $result['status']) {
            $response = Http::put($url . '/pagos/' . $id, [
                'fecha' => $fecha,
                'monto' => $request->montoTotal,
                'concepto' => "Orden de trabajo",
                'estado' => true,
                'factura_id' => $result['factura']['id'],
            ]);

            $result = $response->json();

            if ($result && $result['status']) {

                $descripcion = 'Pago creado con el ID: ' . $result['pago']['id'];
                registrarBitacora($descripcion);

                session()->flash('guardado', 'El pago ha sido registrado correctamente.');
                return redirect()->route('pagos.index');
            } else {
                session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
                return redirect()->back();
            }
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
