<x-layouts.app> <x-layouts.content title="Vehículos" subtitle="" name="Vehículos"> <div class="row"> <div
    class="col-12"> <div class="mb-2 d-flex justify-content-between">

    <div class="form-group"> <a href="{{ route('vehiculos.create') }}" class="btn btn-primary waves-effect waves-light">
        <i class="fas fa-plus-circle"></i>&nbsp;
        Nuevo vehículo
        </a>
    </div>
    </div> <div class="card-box">

    <div class="table-responsive"> <table id="table-vehiculos" class="table table-hover mb-0 dts"> <thead
    class="bg-dark text-center text-white text-nowrap">
    <tr style="cursor: pointer"> <th scope="col">ID</th> <th>CLIENTE</th>
        <th>PLACA</th>
        <th>NUMERO DE CHASIS</th>
        <th>COLOR</th>
        <th>AÑO</th>
        <th>MARCA</th>
        <th>MODELO</th>
        <th>TIPO DE VEHICULO</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @if ($vehiculos == null || empty($vehiculos))
    <tr class="text-nowrap text-center"> <th scope="row" class="align-middle" colspan="10">No hay registros</th> </tr>
        @else
        @foreach ($vehiculos as $vehiculo)
    <tr class="text-nowrap text-center">
        <th scope="row" class="align-middle">{{ $vehiculo['id'] }}</th>
        <td class="align-middle">
        @foreach ($clientes as $cliente)
        @if ($cliente['id'] == $vehiculo['cliente_id'])
        {{ $cliente['nombre'] }} {{ $cliente['apellido'] }}
        @endif
        @endforeach
        </td>
        <td class="align-middle">{{ $vehiculo['placa'] }}</td>
        <td class="align-middle">{{ $vehiculo['nro_chasis'] }}</td>
        <td class="align-middle">{{ $vehiculo['color'] }}</td>
        <td class="align-middle">{{ $vehiculo['año'] }}</td>
        <td class="align-middle">
        @foreach ($marcas as $marca)
        @if ($marca['id'] == $vehiculo['marca_id'])
        {{ $marca['nombre'] }}
        @endif
        @endforeach
        </td>
        <td class="align-middle">
        @foreach ($modelos as $modelo)
        @if ($modelo['id'] == $vehiculo['modelo_id'])
        {{ $modelo['nombre'] }}
        @endif
        @endforeach
        </td>
        <td class="align-middle">
            @if(isset($tipoVehiculos) && is_array($tipoVehiculos) && count($tipoVehiculos) > 0)
            @foreach ($tipoVehiculos as $tipoVehiculo)
            @if ($tipoVehiculo['id'] == $vehiculo['tipo_vehiculo_id'])
            {{ $tipoVehiculo['nombre'] }}
            @endif
            @endforeach
            @else
            No hay tipos de vehículos disponibles.
            @endif


        </td>

        <td class="align-middle text-nowrap">
            <a href="{{ route('vehiculos.edit', $vehiculo['id']) }}" title="Editar" class="btn btn-sm btn-primary"><i
                    class="fas fa-edit"></i></a>
            <a href="{{ route('vehiculos.delete', $vehiculo['id']) }}" title="Eliminar" class="btn btn-sm btn-danger"><i
                    class="fas fa-trash-alt"></i></a>
        </td>
    </tr>
    @endforeach
    @endif
    </tbody>
    </table>
    </div>

    </div>
    </div>
    </div>

    </x-layouts.content>

    </x-layouts.app>