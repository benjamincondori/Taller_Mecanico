<x-layouts.app>
    <x-layouts.content title="Estado de Vehiculo" subtitle="" name="Estado de Vehiculo">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-info-circle fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Detalles del Estado de Vehiculo</h3>
                    </div>

                    <div class="px-4 pt-2 pb-2">
                        <p><strong>ID:</strong> {{ $EstadoVehiculo['id'] }}</p>
                        <p><strong>Cliente:</strong> {{ $cliente['nombre'] }} {{ $cliente['apellido'] }}</p>
                        <p><strong>Telefono:</strong> {{ $cliente['telefono'] }}</p>
                        <p><strong>Direccion:</strong> {{ $cliente['direccion'] }}</p>
                        <p><strong>Placa:</strong> {{ $vehiculo['placa'] }}</p>
                        <p><strong>Descripción:</strong> {{ $EstadoVehiculo['descripcion'] }}</p>
                        <p><strong>Fecha y hora:</strong> {{ $EstadoVehiculo['fecha'] }}</p>
                        <p><strong>Estado:</strong> <span class="{{ $statusColor }}">{{ $EstadoVehiculo['estado'] }}</span></p>


                        <!-- Agrega más detalles si es necesario -->
                    </div>

                    <div class="form-group text-right m-b-0">
                        <a href="{{ route('estadoVehiculo.index') }}" class="btn btn-primary waves-effect waves-light">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </x-layouts.content>
</x-layouts.app>
