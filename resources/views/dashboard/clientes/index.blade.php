<x-layouts.app>

    <x-layouts.content title="Clientes" subtitle="" name="Clientes">

        <div class="row">
            <div class="col-12">

                <div class="mb-2 d-flex justify-content-between">
                    <div class="form-group">
                        <a href="{{ route('clientes.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Nuevo Cliente
                        </a>
                    </div>
                </div>

                <div class="card-box">
                    <div class="table-responsive">
                        <table id="table-clientes" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th scope="col">CI</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Género</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $cliente)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">{{ $cliente['id'] }}</th>
                                    <th scope="row" class="align-middle">{{ $cliente['ci'] }}</th>
                                    <td class="align-middle">{{ $cliente['nombre'] }}</td>
                                    <td class="align-middle">{{ $cliente['apellido'] }}</td>
                                    <td class="align-middle">{{ $cliente['direccion'] }}</td>
                                    <td class="align-middle">{{ $cliente['telefono'] }}</td>
                                    <td class="align-middle">{{ $cliente['genero'] }}</td>
                                    <td class="align-middle text-nowrap">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('clientes.show', $cliente['id']) }}" title="Ver" class="btn btn-sm btn-warning">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('clientes.edit', $cliente['id']) }}" title="Editar"  class="btn btn-sm btn-primary mx-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form id="formDeleteCliente_{{ $cliente['id'] }}" action="{{route('clientes.delete', $cliente['id']) }}" method="post">
                                                @csrf
                                                <button type="button" title="Eliminar"
                                                onclick="confirmDelete({{ $cliente['id'] }})" title="Eliminar" class="btn btn-sm btn-danger">
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
                        var formId = 'formDeleteCliente_' + id;
                        var form = document.getElementById(formId);
                        form.submit(); // Envía el formulario si el usuario confirma
                    }
                });
            }
        </script>
    @endpush

</x-layouts.app>
