<x-layouts.app>

    <x-layouts.content title="Asistencia Técnica" subtitle="" name="Asistencia Técnica">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-pencil-alt fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Solicitud de Asistencia Técnica N° {{ $solicitud['id'] }}</h3>
                    </div>

                    <hr class="mx-2" style="border-color: #ced4da">

                    {{-- <div class="row px-4 pt-1"> --}}
                    <form method="post" action="{{ route('auxilio.update',  $solicitud['id']) }}">
                        @csrf

                        <div class="row px-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><strong>Nombre del cliente:</strong></label>
                                    <input type="text" class="form-control"
                                        value="{{ $solicitud['cliente']['nombre'] }} {{ $solicitud['cliente']['nombre'] }}" readonly style="background: transparent;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="d-flex flex-md-wrap align-items-center">
                                        <label for="tecnico_id" class="control-label">
                                            <strong>Asignar Técnico:</strong></label>
                                        <select class="form-control" data-toggle="select2" id="tecnico_id"
                                            name="tecnico_id">
                                            <option value="">Seleccionar</option>
                                            @foreach ($mecanicos as $mecanico)
                                            <option value="{{ $mecanico['id'] }}"
                                            @if ($mecanico['id'] == old('tecnico_id', $solicitud['tecnico_id'])) selected @endif>{{
                                                $mecanico['nombre'] }} {{ $mecanico['apellido'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('tecnico_id')
                                        <span class="error text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row px-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><strong>Fecha y hora de solicitud:</strong></label>
                                    <input type="text" class="form-control"
                                        value="{{ formatearFecha($solicitud['fecha_solicitud']) }}" readonly style="background: transparent;">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="d-flex flex-md-wrap align-items-center">
                                        <label for="estado" class="control-label mr-2 w-25">
                                            <strong>Estado:</strong></label>
                                        <select class="form-control" id="estado"
                                            name="estado">
                                            <option value="Pendiente" {{ old('estado', $solicitud['estado']) === 'Pendiente' ? 'selected' : '' }}>
                                                Pendiente
                                            </option>
                                            <option value="En proceso" {{ old('estado', $solicitud['estado']) === 'En proceso' ? 'selected' : '' }}>
                                                En proceso
                                            </option>
                                            <option value="Finalizado" {{ old('estado', $solicitud['estado']) === 'Finalizado' ? 'selected' : '' }}>
                                                Finalizado
                                            </option>
                                        </select>
                                        @error('estado')
                                        <span class="error text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row px-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><strong>Longitud:</strong></label>
                                    <input type="text" class="form-control"
                                        value="{{ $solicitud['longitud'] }}" readonly style="background: transparent;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><strong>Latitud:</strong></label>
                                    <input type="text" class="form-control"
                                        value="{{ $solicitud['latitud'] }}" readonly style="background: transparent;">
                                </div>
                            </div>
                        </div>

                        <div class="row px-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><strong>Dirección:</strong></label>
                                    <input type="text" class="form-control"
                                        value="{{ $solicitud['direccion'] }}" readonly style="background: transparent;">
                                </div>
                            </div>
                        </div>

                        <div class="row px-4">
                            @if ($solicitud['servicio'] != null)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><strong>Servicio Solicitado:</strong></label>
                                    <input type="text" class="form-control" style="background: transparent;"
                                        value="{{ $solicitud['servicio']['nombre'] }}" readonly>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="row px-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><strong>Descripción del Problema:</strong></label>
                                    <textarea class="form-control" rows="3" style="background: transparent;"
                                        readonly>{{ $solicitud['descripcion_problema'] }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row px-4">
                            <div class="col-md-12">
                                <label class="control-label"><strong>Imagen:</strong></label>
                                <div class="form-group">
                                    <a href="{{ env('URL_SERVER') }}{{ $solicitud['imagen'] }}" target="_blank">
                                        <img src="{{ env('URL_SERVER') }}{{ $solicitud['imagen'] }}" width="300" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group px-4 text-right m-b-0">
                            <a href="{{ route('auxilio.index') }}" class="btn btn-danger waves-effect m-l-5">
                                Cancelar
                            </a>
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Actualizar
                            </button>
                        </div>

                    </form>
                    {{-- </div> --}}

                </div>
            </div>
        </div>

    </x-layouts.content>

</x-layouts.app>
