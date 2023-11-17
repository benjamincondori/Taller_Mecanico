<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductoController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/productos');
        $data = $response->json();

        return view('dashboard.productos.index', compact('data'));
    }


    public function create()
    {
        if (!verificarPermiso('Agregar_Productos')) {
            session()->flash('accesoDenegado');
            return redirect()->back();
        }

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/categorias');
        $categorias = $response->json();

        $response = Http::get($url . '/proveedores');
        $proveedores = $response->json();

        return view('dashboard.productos.create', compact('categorias', 'proveedores'));
    }


    public function store(Request $request)
    {
        // Validación de datos

        // dd($request);

        // $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        // $response = Http::post($url . '/productos', [
        //     'imagen' => $request->input('imagen'),
        // ]);



        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|mimes:png,jpg,jpeg|max:10240',
            'stock_disponible' => 'required|integer',
            'stock_minimo' => 'required|integer',
            'precio_venta' => 'required|numeric',
            'precio_compra' => 'required|numeric',
            'categoria_id' => 'required|integer',
            'proveedor_id' => 'required|integer'
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::post($url.'/productos', [
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'imagen' => $request->input('imagen'),
            'stock_disponible' => $request->input('stock_disponible'),
            'stock_minimo' => $request->input('stock_minimo'),
            'precio_venta' => $request->input('precio_venta'),
            'precio_compra' => $request->input('precio_compra'),
            'categoria_id' => $request->input('categoria_id'),
            'proveedor_id' => $request->input('proveedor_id'),
        ]);


        $result = $response->json();
        if ($result && $result['status']) {

            $descripcion = 'Producto creado con el ID: ' . $result['producto']['id'];
            registrarBitacora($descripcion);

            session()->flash('guardado','El producto ha sido guardado exitosamente.');
            return redirect()->route('productos.index');
        } else {
            session()->flash('error','Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->back();
        }
    }


    public function show(string $id)
    {
        if (!verificarPermiso('Ver_Productos')) {
            session()->flash('accesoDenegado');
            return redirect()->back();
        }
    }


    public function edit(string $id)
    {
        if (!verificarPermiso('Editar_Productos')) {
            session()->flash('accesoDenegado');
            return redirect()->back();
        }

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::get($url . '/productos/' . $id);
        $producto = $response->json();

        $response = Http::get($url . '/categorias');
        $categorias = $response->json();

        $response = Http::get($url . '/proveedores');
        $proveedores = $response->json();

        return view('dashboard.productos.edit', compact('producto', 'categorias', 'proveedores'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|mimes:png,jpg,jpeg|max:10240',
            'stock_disponible' => 'required|integer',
            'stock_minimo' => 'required|integer',
            'precio_venta' => 'required|numeric',
            'precio_compra' => 'required|numeric',
            'categoria_id' => 'required|integer',
            'proveedor_id' => 'required|integer'
        ]);

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::put($url . '/productos/' . $id, [
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'imagen' => $request->input('imagen'),
            'stock_disponible' => $request->input('stock_disponible'),
            'stock_minimo' => $request->input('stock_minimo'),
            'precio_venta' => $request->input('precio_venta'),
            'precio_compra' => $request->input('precio_compra'),
            'categoria_id' => $request->input('categoria_id'),
            'proveedor_id' => $request->input('proveedor_id'),
        ]);

        $result = $response->json();
        if ($result && $result['status']) {

            $descripcion = 'Producto actualizado con el ID: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('actualizado', 'El producto ha sido actualizado exitosamente.');
            return redirect()->route('productos.index');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
            return redirect()->route('productos.edit', $id);
        }
    }


    public function destroy(string $id)
    {
        if (!verificarPermiso('Eliminar_Productos')) {
            session()->flash('accesoDenegado');
            return redirect()->back();
        }

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
        $response = Http::delete($url . '/productos/' . $id);
        $result = $response->json();

        if ($result && $result['status']) {

            $descripcion = 'Producto eliminado con el ID: ' . $id;
            registrarBitacora($descripcion);

            session()->flash('eliminado', 'El producto ha sido eliminado exitosamente.');
        } else {
            session()->flash('error', 'Ha ocurrido un error. Por favor, intenta nuevamente.');
        }
        return redirect()->route('productos.index');
    }
}
