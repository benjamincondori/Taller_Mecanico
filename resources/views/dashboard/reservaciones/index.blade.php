<x-layouts.app>

    <x-layouts.content title="Reservacion" subtitle="" name="Reservacion">

        
        <div class="row">
            <div class="col-12">
                <div class="card-box col-11" >
                    <div id ="calendar"> </div>
                </div>
            </div>
        </div>

    </x-layouts.content>

    {{-- con esto estoy exportando los scripts del calendario a App.blade.php --}}
    @push('scripts') 
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            locale: 'es',
            aspectRatio: 2,
            firstDay: 1,
            headerToolbar:{
                end: 'dayGridMonth,timeGridWeek,listWeek today prev,next'
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