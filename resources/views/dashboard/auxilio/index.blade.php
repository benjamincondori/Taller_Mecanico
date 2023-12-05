<x-layouts.app>

    <x-layouts.content title="Asistencias Técnicas" subtitle="" name="Asistencias Técnicas">

        <div class="row">
            <div class="col-12">

                {{-- <div class="mb-2 d-flex justify-content-between">
                    <div class="form-group">
                        <a href="{{ route('clientes.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Nuevo Cliente
                        </a>
                    </div>
                </div> --}}

                <div class="card-box">
                    <div class="table-responsive">
                        <table id="table-clientes" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Técnico</th>
                                    <th scope="col">Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $solicitud)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">{{ $solicitud['id'] }}</th>
                                    <td class="align-middle text-wrap">
                                        {{ $solicitud['cliente']['nombre'] }} {{ $solicitud['cliente']['apellido'] }}
                                    </td>
                                    <td class="align-middle text-wrap" style="width: 200px">{{ $solicitud['direccion'] }}</td>
                                    <td class="align-middle">{{ formatearFecha($solicitud['fecha_solicitud']) }}</td>
                                    <td class="align-middle text-wrap">
                                        @if ($solicitud['tecnico'] != null)
                                            {{ $solicitud['tecnico']['nombre'] }} {{ $solicitud['tecnico']['apellido'] }}
                                        @else
                                            Sin asignar
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $solicitud['estado'] }}</td>
                                    <td class="align-middle text-nowrap">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('auxilio.show', $solicitud['id']) }}" title="Ver" class="btn btn-sm btn-warning">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('auxilio.edit', $solicitud['id']) }}" title="Editar"  class="btn btn-sm btn-primary mx-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form id="formDeleteAuxilio_{{ $solicitud['id'] }}" action="{{route('auxilio.delete', $solicitud['id']) }}" method="post">
                                                @csrf
                                                <button type="button" title="Eliminar"
                                                onclick="confirmDelete({{ $solicitud['id'] }})" title="Eliminar" class="btn btn-sm btn-danger">
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
                        var formId = 'formDeleteAuxilio_' + id;
                        var form = document.getElementById(formId);
                        form.submit(); // Envía el formulario si el usuario confirma
                    }
                });
            }
        </script>
    @endpush

</x-layouts.app>
