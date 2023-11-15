<x-layouts.app>

    <x-layouts.content title="Estados de Vehiculos" subtitle="" name="Estados de Vehiculos">

        <div class="row">
            <div class="col-12">

                <div class="mb-2 d-flex justify-content-between">
                    <div class="form-group">
                        <a href="{{ route('estadovehiculo.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Registrar nuevo estado de vehiculo
                        </a>
                    </div>
                </div>

                <div class="card-box">
                    <div class="table-responsive">
                        <table id="table-estadovehiculos" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Placa del Vehículo</th>
                                    <th scope="col">Estado</th>
                                    
                                    <th scope="col">Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $estadovehiculo)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle" style="width: 120px">
                                        {{ $estadovehiculo['id'] }}</th>
                                    <td class="align-middle">
                                        {{ $estadovehiculo['vehiculo']['cliente']['nombre'] }}
                                        {{ $estadovehiculo['vehiculo']['cliente']['apellido'] }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $estadovehiculo['vehiculo']['placa'] }}
                                    </td>
                                    <th scope="row" class="align-middle" style="width: 120px">
                                        {{ $estadovehiculo['estado'] }}</th>
                                        
                                    <td class="align-middle">
                                        {{ $estadovehiculo['fecha'] }}
                                    </td>
                                    <td class="align-middle text-nowrap" style="width: 200px">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('estadovehiculo.show', $estadovehiculo['id']) }}" title="Ver" class="btn btn-sm btn-warning">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('estadovehiculo.edit', $estadovehiculo['id']) }}" title="Editar" class="btn btn-sm btn-primary mx-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form id="formDeleteestadovehiculo_{{ $estadovehiculo['id'] }}"
                                            action="{{route('estadovehiculo.delete', $estadovehiculo['id']) }}" method="post">
                                                @csrf
                                                <button type="button" title="Eliminar"
                                                onclick="confirmDelete({{ $estadovehiculo['id'] }})" title="Eliminar" class="btn btn-sm btn-danger">
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
                        var formId = 'formDeleteestadovehiculo_' + id;
                        var form = document.getElementById(formId);
                        form.submit(); // Envía el formulario si el usuario confirma
                    }
                });
            }
        </script>
    @endpush

</x-layouts.app>
