<x-layouts.app>

    <x-layouts.content title="Vehículos" subtitle="" name="Vehículos">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-car fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Registrar nuevo vehículo</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{ route('vehiculos.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="placa" class="control-label">Placa</label>
                                    <input type="text" class="form-control" id="placa" name="placa" placeholder="ABC1234"
                                        value="{{ old('placa') }}" required>
                                    @error('placa')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nro_chasis" class="control-label">Número de Chasis</label>
                                    <input type="text" class="form-control" id="nro_chasis" name="nro_chasis"
                                        placeholder="Número de Chasis" value="{{ old('nro_chasis') }}" required>
                                    @error('nro_chasis')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="año" class="control-label">Año</label>
                                    <input type="text" class="form-control" id="año" name="año" placeholder="2023"
                                        value="{{ old('año') }}" required>
                                    @error('año')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color" class="control-label">Color</label>
                                    <input type="text" class="form-control" id="color" name="color" placeholder="Rojo"
                                        value="{{ old('color') }}" required>
                                    @error('color')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="marca_id" class="control-label">Marca</label>
                                    <select class="form-control" name="marca_id" id="marca_id" required>
                                        <option value="">Seleccionar</option>
                                        @foreach ($marcas as $marca)
                                            <option value="{{ $marca['id'] }}">{{ $marca['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('marca_id')
                                        <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="modelo_id" class="control-label">Modelo</label>
                                    <select class="form-control" name="modelo_id" id="modelo_id" required>
                                        <option value="">Seleccionar</option>
                                        @foreach ($modelos as $modelo)
                                            <option value="{{ $modelo['id'] }}">{{ $modelo['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('modelo_id')
                                        <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo_vehiculo_id" class="control-label">Tipo de Vehículo</label>
                                    <select class="form-control" name="tipo_vehiculo_id" id="tipo_vehiculo_id" required>
                                        <option value="">Seleccionar</option>
                                        @foreach ($tipoVehiculos as $tipoVehiculo)
                                            <option value="{{ $tipoVehiculo['id'] }}">{{ $tipoVehiculo['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('tipo_vehiculo_id')
                                        <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cliente_id" class="control-label">Cliente</label>
                                    <select class="form-control" name="cliente_id" id="cliente_id" required>
                                        <option value="">Seleccionar</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente['id'] }}">{{ $cliente['nombre'] }} {{ $cliente['apellido'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('cliente_id')
                                        <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <a href="{{ route('vehiculos.index') }}" class="btn btn-danger waves-effect m-l-5">
                                Cancelar
                            </a>
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Guardar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </x-layouts.content>

</x-layouts.app>
