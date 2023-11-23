<x-layouts.app>

    <x-layouts.content title="Reservas" subtitle="" name="Reservas">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-wrench fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">
                            Crear nueva reserva
                        </h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{route('reserva.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="empleado_id"> Empleado agendando</label>
                                  <select class="form-control" name="empleado_id" id="empleado_id" >
                                        <option selected value="{{$UsuarioEmpleado['empleado']['id']}}">{{$UsuarioEmpleado['empleado']['nombre'].' '.$UsuarioEmpleado['empleado']['apellido']}}</option>
                                    </select>
                                </div>   
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="estadod">Estado de la Reserva</label>
                                  <select class="form-control" name="estado" id="estado">
                                      <option selected value="Aprobado">Aprobado</option>
                                        <option value="Pendiente"> Pendiente</option>
                                        <option value="Realizado">Realizado</option>
                                    </select>
                                </div>   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group mb-3">
                                        <label for="fecha">Fecha</label>
                                        <input class="form-control" id="fecha" type="date" name="fecha">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="hora_inicio">Hora de Inicio</label>
                                    <input class="form-control" id="hora_inicio" type="time" name="hora_inicio"
                                     value="" oninput="actualizarHoraFin()">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="hora_fin">Hora de Fin</label>
                                    <input class="form-control" id="hora_fin" type="time" name="hora_fin"
                                     value="">
                                     <span id="horaFinError" class="error text-danger">* Inserte Servicio y Hora</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                        <label for="servicio_id">Servicio</label>
                                    <select class="form-control" id="servicio_id" name="servicio_id" oninput="actualizarHoraFin()">
                                        <option value="">Selecciona un servicio</option>
                                        @foreach ($Servicios as $servicio)
                                        <option value="{{ $servicio['id'] }}" data-duracion={{$servicio['duracion']}}>{{ $servicio['nombre'] }}
                                            | {{$servicio['precio']}}.Bs</option>
                                        @endforeach
                                    </select>
                                    @error('servicio_id')
                                        <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="cliente_id">Cliente</label>
                                <select class="form-control" id="cliente_id" name="cliente_id">
                                    <option value="">Selecciona un cliente</option>
                                    @foreach ($Clientes as $cliente)
                                    <option value="{{ $cliente['id'] }}">{{ $cliente['ci'] }} | {{
                                        $cliente['nombre'] }} {{ $cliente['apellido'] }}</option>
                                    @endforeach
                                </select>
                                @error('cliente_id')
                                    <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <a href="{{ route('reserva.index') }}" class="btn btn-danger waves-effect m-l-5">
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

    
    {{-- Script para que se actualice la hora_fin del formulario --}}
    <script>
        function actualizarHoraFin() {
          // Obtén el valor de la hora de inicio
          var horaInicio = document.getElementById('hora_inicio').value;

          // Obtén la opción seleccionada y su duración
          var servicioSelect = document.getElementById('servicio_id');
          var duracionServicio = servicioSelect.options[servicioSelect.selectedIndex].getAttribute('data-duracion');
          console.log('Duración del servicio:', duracionServicio);

          // Si la hora de inicio no está vacía y hay una duración seleccionada
          if (horaInicio !== '' && duracionServicio) {
              // Oculta el placeholder
              document.getElementById('horaFinError').style.display = 'none';

              // Muestra la entrada de tiempo de la hora de fin
              document.getElementById('hora_fin').style.display = 'block';

              // Suma la duración del servicio a la hora de inicio
              var horaFin = sumarTiempo(horaInicio, duracionServicio);

              // Actualiza el valor de la hora de fin
              document.getElementById('hora_fin').value = horaFin;
          } else {
              // Si la hora de inicio está vacía o no hay duración seleccionada, muestra el placeholder y oculta la entrada de tiempo
              document.getElementById('horaFinError').style.display = 'inline';
              document.getElementById('hora_fin').value = "";   
          }
      }

      // Función para sumar tiempo a una hora dada (en formato HH:mm:ss)
      function sumarTiempo(hora, tiempoASumar) {
          var horaInicio = new Date('2020-01-01 ' + hora);
          var tiempoSumar = new Date('2020-01-01 ' + tiempoASumar);
          var Margen_segundo = new Date('2020-01-01 00:00:00');
          //pasa aca tambien lo de que se suma las 4 horas de la nada ToT, pero sumando otra cosa mas se arregla wtf

          var nuevaHora = new Date(horaInicio.getTime() + tiempoSumar.getTime() - Margen_segundo.getTime());

          // Formatea la nueva hora
          var horaNueva = nuevaHora.getHours().toString().padStart(2, '0');
          var minutosNuevos = nuevaHora.getMinutes().toString().padStart(2, '0');
          var segundosNuevos = nuevaHora.getSeconds().toString().padStart(2, '0');

          return horaNueva + ':' + minutosNuevos + ':' + segundosNuevos;
      }
  </script>

</x-layouts.app>
