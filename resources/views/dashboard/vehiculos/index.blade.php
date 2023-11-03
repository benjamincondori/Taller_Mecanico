<x-layouts.app>

    <x-layouts.content title="Listado de vehiculos" subtitle="" name="Listado de vehiculos">

        <div class="row">
            <div class="col-12">

                <div class="mb-2 d-flex justify-content-between">
                    <div class="form-group">
                        <a href="{{ route('vehiculos.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Nuevo Vehiculo
                        </a>
                    </div>
                </div>

                <div class="card-box">
                    <div class="table-responsive">
                        <table id="table-vehiculos" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th scope="col">Placa</th>
                                    <th scope="col">Nro Chasis</th>
                                    <th scope="col">Año</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Cliente</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehiculos as $vehiculo)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">{{ $vehiculo['id'] }}</th>
                                    <td class="align-middle">{{ $vehiculo['placa'] }}</td>
                                    <td class="align-middle">{{ $vehiculo['nro_chasis'] }}</td>
                                    <td class="align-middle">{{ $vehiculo['año'] }}</td>
                                    <td class="align-middle">{{ $vehiculo['color'] }}</td>
                                    <td class="align-middle">{{ $vehiculo['marca']['nombre'] }}</td>
                                    <td class="align-middle">{{ $vehiculo['modelo']['nombre'] }}</td>
                                    <td class="align-middle">
                                        {{ $vehiculo['cliente']['nombre'] }} {{ $vehiculo['cliente']['apellido'] }}
                                    </td>
                                    <td class="align-middle text-nowrap">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('vehiculos.show', $vehiculo['id']) }}" title="Ver" class="btn btn-sm btn-warning">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('vehiculos.edit', $vehiculo['id']) }}" title="Editar" class="btn btn-sm btn-primary mx-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form id="formDeleteVehiculo_{{ $vehiculo['id'] }}" action="{{route('vehiculos.delete', $vehiculo['id']) }}" method="post">
                                                @csrf
                                                <button type="button" title="Eliminar"
                                                onclick="confirmDelete({{ $vehiculo['id'] }})" title="Eliminar" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </x-layouts.content>

    @push('js')
        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#556ee6',
                    cancelButtonColor: '#f46a6a',
                    confirmButtonText: 'Sí, eliminarlo',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formId = 'formDeleteVehiculo_' + id;
                        var form = document.getElementById(formId);
                        form.submit(); // Envía el formulario si el usuario confirma
                    }
                });
            }
        </script>
    @endpush

</x-layouts.app>
