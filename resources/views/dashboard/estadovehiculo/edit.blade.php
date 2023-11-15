<x-layouts.app>

    <x-layouts.content title="Estado del Vehiculo" subtitle="" name="Estado del Vehiculo">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-pencil-alt fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Editar Estado de Vehiculo</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{ route('estadoVehiculo.update', $EstadoVehiculo['id']) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion" class="control-label">Descripción</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="5"
                                        placeholder="">{{ old('descripcion', $EstadoVehiculo['descripcion']) }}</textarea>
                                    @error('descripcion')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
        <div class="col-md-12">
        <div class="form-group">
            <label for="estado" class="control-label">Estado</label>
            <select class="form-control" name="estado" id="estado">
            <option value="">Seleccionar Estado</option>
            <option value="En espera" {{ old('estado') === 'En espera' ? 'selected' : '' }}>En espera</option>
            <option value="En diagnóstico" {{ old('estado') === 'En diagnóstico' ? 'selected' : '' }}>En
            diagnóstico</option>
            <option value="En reparación" {{ old('estado')==='En reparación' ? 'selected' : '' }}>En reparación</option>
            <option value="En espera de repuestos" {{ old('estado') === 'En espera de repuestos' ? 'selected' : '' }}>En
            espera de repuestos</option>
            <option value="En espera de autorización" {{ old('estado') === 'En espera de autorización' ? 'selected' : ''
            }}>En espera de autorización</option>
            <option value="Listo para entrega" {{ old('estado')==='Listo para entrega' ? 'selected' : '' }}>Listo para
                entrega</option>
            <option value="Entregado" {{ old('estado') === 'Entregado' ? 'selected' : '' }}>Entregado</option>
            <!-- Agrega más estados según sea necesario -->
            </select>
            @error('estado')
            <span class="error text-danger">* {{ $message }}</span>
            @enderror
            </div>
            </div>
        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vehiculo_id" class="control-label">Vehículo</label>
                                    <select class="form-control" name="vehiculo_id" id="vehiculo_id">
                                        <option value="">Seleccionar</option>
                                        @foreach ($vehiculos as $vehiculo)
                                            <option value="{{ $vehiculo['id'] }}"
                                            @if ($vehiculo['id'] == old('vehiculo_id', $EstadoVehiculo['vehiculo_id']))
                                                selected
                                            @endif
                                            >{{ $vehiculo['placa'] }} - {{ $vehiculo['cliente']['nombre'] }} {{ $vehiculo['cliente']['apellido'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('vehiculo_id')
                                        <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <a href="{{ route('estadoVehiculo.index') }}" class="btn btn-danger waves-effect m-l-5">
                                Cancelar
                            </a>
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Actualizar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </x-layouts.content>

</x-layouts.app>
