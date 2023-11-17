<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

function registrarBitacora($descripcion)
{
    $id_usuario = Session::get('usuario.id');
    $ipUsuario = request()->ip();
    $fecha = Carbon::now()->format('Y-m-d H:i:s');

    $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
    $response = Http::post($url . '/bitacoras', [
        'fecha' => $fecha,
        'ip_usuario' => $ipUsuario,
        'descripcion' => $descripcion,
        'id_usuario' => $id_usuario,
    ]);
}

function verificarPermiso($permiso) {
    $usuario = Session::get('usuario');

    $rol = $usuario['rol']['nombre'];
    $rol_id = $usuario['rol_id'];

    if ($rol === "Administrador") {
        return true;
    }

    $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');
    $response = Http::get($url . '/permisos-tienePermiso/'.$rol_id.'/'.$permiso);
    $data = $response->json();
    return $data['tienePermiso'];
}

function formatearFecha($fecha)
{
    // Convierte la fecha a un objeto Carbon
    $carbonFecha = Carbon::parse($fecha);

    // Formatea la fecha en el formato deseado
    $fechaFormateada = $carbonFecha->format('d/m/Y - H:i:s A');

    return $fechaFormateada;
}

function formatoFecha($fecha)
{
    $carbonFecha = Carbon::parse($fecha);
    $fechaFormateada = $carbonFecha->format('d/m/Y');
    return $fechaFormateada;
}

function transformarFormatoFecha($fecha)
{
    $fecha = DateTime::createFromFormat('d/m/Y', $fecha);
    return $fecha->format('Y-m-d');
}

function sumaPrecioTotalProductos($productos) {
    $sumaPrecios = 0;
    if (count($productos) > 0) {
        foreach ($productos as $producto) {
            $sumaPrecios += floatval($producto['pivot']['producto_preciototal']);
        }
    }
    return $sumaPrecios;
}

function sumaPrecioTotalServicios($servicios) {
    $sumaPrecios = 0;
    if (count($servicios) > 0) {
        foreach ($servicios as $servicio) {
            $sumaPrecios += floatval($servicio['pivot']['servicio_preciototal']);
        }
    }
    return $sumaPrecios;
}

function calcularSubtotal($productos, $servicios) {
    $costoProductos = sumaPrecioTotalProductos($productos);
    $costoServicios = sumaPrecioTotalServicios($servicios);
    return $costoProductos + $costoServicios;
}

function formatearNumero($numero) {
    return number_format($numero, 2, ',', '.');
}



