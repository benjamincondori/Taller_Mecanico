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
                    <div id = "calendar" ></div>
                </div>

            </div>
        </div>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
          Launch
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                              <label for="Date">Fecha</label>
                              algun input con fecha
                              <small id="fileHelpId" class="form-text text-muted">Help text</small>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
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