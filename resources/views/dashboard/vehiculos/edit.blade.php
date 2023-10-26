<x-layouts.app>

    <x-layouts.content title="Editar Vehículo" subtitle="" name="Editar Vehículo">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <form action="{{ route('vehiculos.update', $vehiculo['id']) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="tipo_vehiculo" class="form-label">Tipo de Vehículo</label>
                            <select class="form-select" name="tipo_vehiculo_id" id="tipo_vehiculo">
                                @foreach ($tipoVehiculos as $tipoVehiculo)
                                    <option value="{{ $tipoVehiculo['id'] }}"
                                        {{ $tipoVehiculo['id'] == $vehiculo['tipo_vehiculo_id'] ? 'selected' : '' }}>
                                        {{ $tipoVehiculo['nombre'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="placa" class="form-label">Placa</label>
                            <input type="text" class="form-control" id="placa" name="placa" value="{{ $vehiculo['placa'] }}">
                        </div>

                        <div class="mb-3">
                            <label for="nro_chasis" class="form-label">Número de Chasis</label>
                            <input type="text" class="form-control" id="nro_chasis" name="nro_chasis" value="{{ $vehiculo['nro_chasis'] }}">
                        </div>

                        <div class="mb-3">
                            <label for="año" class="form-label">Año</label>
                            <input type="text" class="form-control" id="año" name="año" value="{{ $vehiculo['año'] }}">
                        </div>

                        <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" class="form-control" id="color" name="color" value="{{ $vehiculo['color'] }}">
                        </div>

                        <div class="mb-3">
                            <label for="marca" class="form-label">Marca</label>
                            <select class="form-select" name="marca_id" id="marca">
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca['id'] }}"
                                        {{ $marca['id'] == $vehiculo['marca_id'] ? 'selected' : '' }}>
                                        {{ $marca['nombre'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="modelo" class="form-label">Modelo</label>
                            <select class="form-select" name="modelo_id" id="modelo">
                                @foreach ($modelos as $modelo)
                                    <option value="{{ $modelo['id'] }}"
                                        {{ $modelo['id'] == $vehiculo['modelo_id'] ? 'selected' : '' }}>
                                        {{ $modelo['nombre'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="cliente" class="form-label">Cliente</label>
                            <select class="form-select" name="cliente_id" id="cliente">
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente['id'] }}"
                                        {{ $cliente['id'] == $vehiculo['cliente_id'] ? 'selected' : '' }}>
                                        {{ $cliente['nombre'] }} {{ $cliente['apellido'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Otros campos adicionales según tus necesidades -->

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Actualizar Vehículo</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </x-layouts.content>

</x-layouts.app>
