<x-layouts.app>

    <x-layouts.content title="Registro de Actividad" subtitle="" name="Bitácora - Registro de Actividad">

        <div class="row">
            <div class="col-12">

                <div class="card-box">
                    <div class="table-responsive">
                        <table id="table-bitacora" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Fecha y Hora</th>
                                    <th scope="col">Ip usuario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $bitacora)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">{{ $bitacora['id'] }}</th>
                                    <td class="align-middle">
                                        {{ $bitacora['usuario']['empleado']['nombre'] }}
                                        {{ $bitacora['usuario']['empleado']['apellido'] }}
                                    </td>
                                    <td class="align-middle">{{ $bitacora['descripcion'] }}</td>
                                    <td class="align-middle">{{ formatearFecha( $bitacora['fecha'] ) }}</td>
                                    <td class="align-middle">{{ $bitacora['ip_usuario'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </x-layouts.content>

</x-layouts.app>
