<x-layouts.app>

    <x-layouts.content title="Asistencia Técnica" subtitle="" name="Asistencia Técnica">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-check-square fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Solicitud de Asistencia Técnica N° {{ $solicitud['id'] }}</h3>
                    </div>

                    <hr class="mx-2" style="border-color: #ced4da">

                    <div class="row px-4 pt-1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><strong>Nombre del cliente:</strong></label>
                                <input type="text" class="form-control"
                                    value="{{ $solicitud['cliente']['nombre'] }} {{ $solicitud['cliente']['nombre'] }}" readonly style="background: transparent;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><strong>Técnico Asignado:</strong></label>
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Doe"
                                    value="@isset($solicitud['tecnico']){{ $solicitud['tecnico']['nombre'] }} {{ $solicitud['tecnico']['apellido'] }}@else No asignado @endisset"
                                    readonly style="background: transparent;">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><strong>Fecha y hora de solicitud:</strong></label>
                                <input type="text" class="form-control"
                                    value="{{ formatearFecha($solicitud['fecha_solicitud']) }}" readonly style="background: transparent;">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><strong>Estado:</strong></label>
                                <input type="text" class="form-control"
                                    value="{{ $solicitud['estado'] }}" readonly style="background: transparent;">
                            </div>
                        </div>

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



                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Dirección:</strong></label>
                                <input type="text" class="form-control"
                                    value="{{ $solicitud['direccion'] }}" readonly style="background: transparent;">
                            </div>
                        </div>

                        @if ($solicitud['servicio'] != null)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><strong>Servicio Solicitado:</strong></label>
                                    <input type="text" class="form-control" style="background: transparent;"
                                        value="{{ $solicitud['servicio']['nombre'] }}" readonly>
                                </div>
                            </div>
                        @endif

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Descripción del Problema:</strong></label>
                                <textarea class="form-control" rows="3" style="background: transparent;"
                                    readonly>{{ $solicitud['descripcion_problema'] }}</textarea>
                            </div>
                        </div>

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
                        <a href="https://www.google.com/maps?q={{$solicitud['latitud']}},{{$solicitud['longitud']}}" target="_blank" class="btn btn-primary">
                            <i class="fas fa-map-marked-alt"></i>&nbsp;&nbsp;
                            Ver en Google Maps
                        </a>

                        <a href="{{ route('auxilio.index') }}" class="btn btn-danger waves-effect m-l-5">
                            Cerrar
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </x-layouts.content>

</x-layouts.app>
