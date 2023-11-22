<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Ordenes de Trabajo</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <section>
        <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td colspan="2" class="text-center">
                    <span style="font-size: 25px; font-weight: bold;">TALLER BALJEET</span>
                </td>
            </tr>
            <tr>
                <td width="30%" style="vertical-align: top; padding-top: 10px; position: relative;">
                    <img src="assets/images/logo-taller-black.png" alt="" height="100">
                </td>
                <td width="70%" class="text-left" style="vertical-align: top; padding-top: 10px;">
                    <h4><strong>Reporte de Ordenes de trabajo</strong></h4>
                    <span><strong>Fecha de Consulta:</strong>
                        {{ \Carbon\Carbon::parse($fechaDesde)->format('d/m/Y') }} al
                        {{ \Carbon\Carbon::parse($fechaHasta)->format('d/m/Y') }}
                    </span>
                    <br>
                    <span><strong>Usuario:</strong>
                        @if (isset($empleado) && !is_null($empleado))
                            {{ $empleado['nombre'] }} {{ $empleado['apellido'] }}
                        @else
                            Todos
                        @endif
                    </span>
                    <br>
                    <span><strong>Cliente:</strong>
                        @if (isset($cliente) && !is_null($cliente))
                            {{ $cliente['nombre'] }} {{ $cliente['apellido'] }}
                        @else
                            Todos
                        @endif
                    </span>
                    <br>
                    <span><strong>Servicio:</strong>
                        @if (isset($servicio) && !is_null($servicio))
                            {{ $servicio['nombre']}}
                        @else
                            Todos
                        @endif
                    </span>
                    <br>
                    <span><strong>Producto:</strong>
                        @if (isset($producto) && !is_null($producto))
                            {{ $producto['nombre'] }}
                        @else
                            Todos
                        @endif
                    </span>
                    <br>
                    <span><strong>Estado:</strong>
                        @if ($estado != 0)
                            {{ $estado }}
                        @else
                            Todos
                        @endif
                    </span>
                </td>
            </tr>
        </table>
    </section>

    <section>
        <div class="table-responsive mt-4">
            <table class="table table-bordered" cellpadding="0" cellspacing="0">
                <thead class="bg-dark text-white text-nowrap text-center">
                    <tr style="cursor: pointer">
                        <th scope="col">ID</th>
                        <th scope="col">Fecha Creación</th>
                        <th scope="col">Fecha Ingreso</th>
                        <th scope="col">Fecha Salida</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Administrativo</th>
                        <th scope="col">Mecánico</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($ordenes) && count($ordenes))
                        @foreach ($ordenes as $orden)
                            <tr class="text-wrap text-center">
                                <th scope="row" class="align-middle">
                                    {{ $orden['id'] }}
                                </th>
                                <td class="align-middle text-nowrap">
                                    {{ $orden['fecha_creacion'] }}
                                </td>
                                <td class="align-middle text-nowrap">
                                    {{ $orden['fecha_inicio'] }}
                                </td>
                                <td class="align-middle text-nowrap">
                                    {{ $orden['fecha_fin'] }}
                                </td>
                                <td class="align-middle">
                                    {{ $orden['cotizacion']['cliente']['nombre'] }}
                                    {{ $orden['cotizacion']['cliente']['apellido'] }}
                                </td>
                                <td class="align-middle">
                                    {{ $orden['cotizacion']['empleado']['nombre'] }}
                                    {{ $orden['cotizacion']['empleado']['apellido'] }}
                                </td>
                                <td class="align-middle">
                                    {{ $orden['mecanico']['nombre'] }}
                                    {{ $orden['mecanico']['apellido'] }}
                                </td>
                                <td class="align-middle">
                                    {{ $orden['estado']}}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-center">
                            <td colspan="9">Sin resultados.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>

    <section class="mt-2">
        Basado en el análisis de los resultados obtenidos, se concluye que en nuestro taller durante el período del
        {{ formatoFechaTexto($fechaDesde) }} al {{ formatoFechaTexto($fechaHasta) }}, se registraron un total de {{ count($ordenes) }} órdenes de trabajo.
    </section>

</body>
</html>

