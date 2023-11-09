<x-layouts.app>

    <x-layouts.content title="Reservacion" subtitle="" name="Reservacion">

        <div class="row">
            <div class="col-12">

                <div class="mb-2 d-flex justify-content-between">

                    <div class="form-group">
                        {{-- creo que solo clientes que tienen iniciada su sesion deberian poder hacer
                            reservaciones o no se como le hacemos --}}
                        <a href="#" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Nueva reservacion
                        </a>
                    </div>

                </div>
                <div class = 'card-box col-11'>
                    <div id = calendar ></div>
                </div>

            </div>
        </div>

    </x-layouts.content>

    {{-- con esto estoy exportando los scripts del calendario a App.blade.php --}}
    @push('scripts') 
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script>
      // todo lo estoy haciendo con un cdn sorry no le entendi como descargar los paquetes  
      document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        //lo de abajo son variables de inicio para configurar el calendario 
        // mirar la documentacion para modificar
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            locale: 'es',
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