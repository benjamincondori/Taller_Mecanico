<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/ventas');
        $ventas = $response->json();

        return view('dashboard.ventas.index',compact('ventas'));
    }
    
    //Para crear un registro en la tabla venta,luego de eso recien añadirle productos 
    public function new(){
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $responseCliente = Http::get($url.'/clientes');
        $clientes = $responseCliente->json();

        return view('dashboard.ventas.new',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $responseVenta = Http::get($url.'/ventas/'.$id);
        $venta = $responseVenta->json();

        $responseProducto = Http::get($url.'/productos');
        $productos = $responseProducto->json();
        

        return view('dashboard.ventas.create',compact('venta','productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'cliente_id' => 'required|string'
        ]);


        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');


        $response = Http::post($url . '/ventas', [
            'monto' => '0',
            'empleado_id' => Session::get('usuario.id'),
            'cliente_id' => $request->input('cliente_id'),
        ]);

        $result = $response->json();
        if ($result && $result['status']) {
            $descripcion = 'Venta creada con el id: ' . $result['venta']['id'];
            registrarBitacora($descripcion);

            session()->flash('guardado', 'Ahora a registrar Productos.');
            return redirect()->route('ventas.create',$result['venta']['id']);
            // return redirect()->route('ventas.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('ventas.new');
        }   
    }

    //Esta funcion recibe el id de la venta y guarda un registro en la tabla VentaProducto con el producto
    // a agregar a la venta

    public function storeProducto(string $id, Request $request)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');

        $request->validate([
            'producto' => 'required|string',
            'cantidadProducto' => 'required',
            'precioPorCantidadProducto' => 'required'
        ]);
        $response = Http::post($url.'/ventas/'.$id.'/productos',[
            'venta_id' => $id,
            'producto_id' => $request->input('producto'),
            'producto_cantidad' => $request->input('cantidadProducto'),
            'producto_preciototal' => $request->input('precioPorCantidadProducto')
        ]);

        $result = $response->json();

        if ($result && $result['status'] ) {
          
            $descripcion = 'Registro VentaProducto creada con el id: ' . $result['ventaproducto']['id'];
            registrarBitacora($descripcion);

            $descripcion1 = 'Monto de Venta con id '.$id.' actualizado';
            registrarBitacora($descripcion1);
            session()->flash('guardado', 'Producto insertado.');

            return redirect()->route('ventas.create',$id);
            // return redirect()->route('ventas.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('ventas.create',$id);
        }   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $responseVenta = Http::get($url.'/ventas/'.$id);
        $venta = $responseVenta->json();

        return view('dashboard.ventas.show',compact('venta'));
    }

    public function generarPago(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url.'/ventas/'.$id.'/generarpago'); 
        $result = $response->json();

        if ($result && $result['status']) {
            session()->flash('guardado', 'Pago generado exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('ventas.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url.'/ventas/'.$id);

        $result = $response->json();
        
        if ($result && $result['status']) {
            session()->flash('eliminado', 'Venta eliminada exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('ventas.index');
    }


    public function destroyProducto(string $id, string $producto_id)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url.'/ventas/'.$id.'/productos/'.$producto_id);
        $result = $response->json();
        
        if ($result && $result['status']) {
            session()->flash('eliminado', 'producto eliminado exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('ventas.create',$id);
    }
}
