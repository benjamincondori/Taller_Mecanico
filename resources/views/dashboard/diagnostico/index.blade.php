<x-layouts.app>

    <x-layouts.content title="Diagnósticos" subtitle="" name="Diagnósticos">

        <div class="row">
            <div class="col-12">

                <div class="mb-2 d-flex justify-content-between">
                    <div class="form-group">
                        <a href="{{ route('diagnostico.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Registrar nuevo diagnóstico
                        </a>
                    </div>
                </div>

                <div class="card-box">
                    <div class="table-responsive">
                        <table id="table-diagnosticos" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Placa del Vehículo</th>
                                    <th scope="col">Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $diagnostico)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle" style="width: 120px">
                                        {{ $diagnostico['id'] }}</th>
                                    <td class="align-middle">
                                        {{ $diagnostico['vehiculo']['cliente']['nombre'] }}
                                        {{ $diagnostico['vehiculo']['cliente']['apellido'] }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $diagnostico['vehiculo']['placa'] }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $diagnostico['fecha'] }}
                                    </td>
                                    <td class="align-middle text-nowrap" style="width: 200px">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('diagnostico.show', $diagnostico['id']) }}" title="Ver" class="btn btn-sm btn-warning">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('diagnostico.edit', $diagnostico['id']) }}" title="Editar" class="btn btn-sm btn-primary mx-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form id="formDeleteDiagnostico_{{ $diagnostico['id'] }}"
                                            action="{{route('diagnostico.delete', $diagnostico['id']) }}" method="post">
                                                @csrf
                                                <button type="button" title="Eliminar"
                                                onclick="confirmDelete({{ $diagnostico['id'] }})" title="Eliminar" class="btn btn-sm btn-danger">
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
                        var formId = 'formDeleteDiagnostico_' + id;
                        var form = document.getElementById(formId);
                        form.submit(); // Envía el formulario si el usuario confirma
                    }
                });
            }
        </script>
    @endpush

</x-layouts.app>
