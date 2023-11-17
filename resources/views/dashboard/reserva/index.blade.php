<x-layouts.app>

    <x-layouts.content title="Reservacion" subtitle="" name="Reservacion">

        <div class="row">
            <div class="col-12">

                <div class="mb-2 d-flex justify-content-between">

                    <div class="form-group">
                        {{-- creo que solo servicios que tienen iniciada su sesion deberian poder hacer
                            reservaciones o no se como le hacemos --}}
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Nueva reservacion
                        </button>
                    </div>

                </div>
                <div class = 'card-box col-11'>
                    <div id = "calendar" ></div>
                </div>

            </div>
        </div>

        
        <!-- Modal -->
        <div class="modal fade bs-modal-lg" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crear Reserva  - {{$UsuarioEmpleado['rol']['nombre']}}  {{$UsuarioEmpleado['empleado']['nombre']}} {{$UsuarioEmpleado['empleado']['apellido']}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group mb-3">
                                            <label for="Fecha">Fecha</label>
                                            <input class="form-control" id="Fecha" type="date" name="Fecha">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="Hora_inicio">Hora de Inicio</label>
                                        <input class="form-control" id="Hora_inicio" type="time" name="Hora_inicio" value="{{$hora}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="Hora_fin">Hora de Fin</label>
                                        <input class="form-control" id="Hora_inicio" type="time" name="Hora_inicio" disabled="" value="{{$hora_fin}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="servicio">Servicio</label>
                                    <select class="form-control" id="servicio" name="servicio">
                                        <option value="">Selecciona un servicio</option>
                                        @foreach ($Servicios as $servicio)
                                        <option value="{{ $servicio['id'] }}">{{ $servicio['nombre'] }}
                                            | {{$servicio['precio']}}.Bs</option>
                                        @endforeach
                                    </select>
                                    @error('servicio')
                                        <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="cliente">Cliente</label>
                                    <select class="form-control" id="cliente" name="cliente">
                                        <option value="">Selecciona un cliente</option>
                                        @foreach ($Clientes as $cliente)
                                        <option value="{{ $cliente['id'] }}">{{ $cliente['ci'] }} | {{
                                            $cliente['nombre'] }} {{ $cliente['apellido'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('cliente')
                                        <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Final del Modal --}}
    </x-layouts.content>

    {{-- con esto estoy exportando los scripts del calendario a App.blade.php --}}
    @push('js') 
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>

    <script>
      // todo lo estoy haciendo con un cdn sorry no le entendi como descargar los paquetes  
      document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        //lo de abajo son variables de inicio para configurar el calendario 
        // mirar la documentacion para modificar
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            events: @json($events),
            locale: 'es',
            slotDuration: '00:15:00',
            allDaySlot: false,
            aspectRatio: 2.3,
            firstDay: 1,
            headerToolbar:{
                end: 'dayGridMonth,timeGridWeek,listWeek today prev,next'
            },
            buttonText:{
                today:    'Hoy',
                month:    'Mes',
                week:     'Semana',
                day:      'Dia',
                list:     'Lista'
            },
            slotLabelFormat:{
                hour: 'numeric',
                minute: '2-digit',
                omitZeroMinute: false,
                meridiem: 'short'
            }
        });
        calendar.render();
      });

    </script>

    @endpush

</x-layouts.app>