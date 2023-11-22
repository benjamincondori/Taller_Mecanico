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
            eventColor: '#f5ce22',
            eventTextColor: '#000000',
            locale: 'es',
            dayMaxEvents: true,
            slotDuration: '00:10:00',
            allDaySlot: false,
            aspectRatio: 1.5,
            firstDay: 1,
            slotMinTime: '07:00:00',
            slotMaxTime: '21:00:00',
            scrollTime: '12:00:00',
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
            },
            eventClick: function(info) {
                var evento = info.event;
                const confi = confirm('Quieres Editar/Eliminar ' + info.event.title);
                if(confi){
                    window.location.href = "/dashboard/reserva/edit/" + evento.id;
                }
            } 
        });
        calendar.render();
        //fin de configs del calendario
      });

    </script>

    @endpush
</x-layouts.app>