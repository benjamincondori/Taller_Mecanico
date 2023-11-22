<table>

    <head>
        <tr>
            <th>Id</th>
            <th>Fecha</th>
            <th>Fecha Ingreso</th>
            <th>Fecha Salida</th>
            <th>Cliente</th>
            <th>Administrativo</th>
            <th>Mecánico</th>
            <th>Estado</th>
        </tr>
    </head>

    <body>
        @foreach($ordenes as $orden)
        <tr>
            <td>{{ $orden['id'] }}</td>
            <td>{{ $orden['fecha_creacion'] }}</td>
            <td>{{ $orden['fecha_inicio'] }}</td>
            <td>{{ $orden['fecha_fin'] }}</td>
            <td>
                {{ $orden['cotizacion']['cliente']['nombre'] }}
                {{ $orden['cotizacion']['cliente']['apellido'] }}
            </td>
            <td>
                {{ $orden['cotizacion']['empleado']['nombre'] }}
                {{ $orden['cotizacion']['empleado']['apellido'] }}
            </td>
            <td>
                {{ $orden['mecanico']['nombre'] }}
                {{ $orden['mecanico']['apellido'] }}
            </td>
            <td>{{ $orden['estado'] }}</td>
        </tr>
        @endforeach
    </body>
</table>
