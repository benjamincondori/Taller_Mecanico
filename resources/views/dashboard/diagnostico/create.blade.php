<x-layouts.app>

    <x-layouts.content title="Diagnósticos" subtitle="" name="Diagnósticos">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-plus-circle fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Crear Nuevo Diagnóstico</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{ route('diagnostico.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion" class="control-label">Descripción</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="5"
                                        placeholder="">{{ old('descripcion') }}</textarea>
                                    @error('descripcion')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="recomendaciones" class="control-label">Recomendaciones</label>
                                    <textarea class="form-control" name="recomendaciones" id="recomendaciones" rows="5"
                                        placeholder="">{{ old('recomendaciones') }}</textarea>
                                    @error('recomendaciones')
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
                                            @if ($vehiculo['id'] == old('vehiculo_id'))
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
                            <a href="{{ route('diagnostico.index') }}" class="btn btn-danger waves-effect m-l-5">
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
