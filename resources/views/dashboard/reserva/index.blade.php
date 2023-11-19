<x-layouts.app>

    <x-layouts.content title="Reservacion" subtitle="" name="Reservacion">

        <div class="row">
            <div class="col-12">

                <div class="mb-2 d-flex justify-content-between">

                    <div class="form-group">
                        <a href="{{ route('reserva.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Nueva Reserva
                        </a>
                    </div>

                </div>
                
                <div class = 'card-box col-11'>
                    <div id = "calendar" ></div>
                </div>

            </div>
        </div>

        
        <!-- Modal -->

        {{-- Final del Modal --}}
    </x-layouts.content>

    {{-- con esto estoy exportando los scripts del calendario a App.blade.php --}}
    @push('js') 
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>

    <script>
      // todo lo estoy haciendo con un cdn sorry no le entendi como descargar los paquetes  
      document.addEventListener('DOMContentLoaded', function() {
        //recupero los datos del formulario
       

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
        //fin de configs del calendario
      });

    </script>

    @endpush
</x-layouts.app>