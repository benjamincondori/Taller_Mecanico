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

function formatearFecha($fecha)
{
    // Convierte la fecha a un objeto Carbon
    $carbonFecha = Carbon::parse($fecha);

    // Formatea la fecha en el formato deseado
    $fechaFormateada = $carbonFecha->format('d/m/Y - H:i:s A');

    return $fechaFormateada;
}


