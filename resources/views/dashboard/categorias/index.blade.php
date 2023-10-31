<x-layouts.app>

    <x-layouts.content title="Categorias" subtitle="" name="Categorias">

        <div class="row">
            <div class="col-12">

                <div class="mb-2 d-flex justify-content-between">
                    <div class="form-group">
                        <a href="{{ route('categorias.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Nueva Categoria
                        </a>
                    </div>
                </div>

                <div class="card-box">
                    <div class="table-responsive">
                        <table id="table-categorias" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">Id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">SuperCategoria</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $categoria)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">{{$categoria['id']}}</th>
                                    <td class="align-middle">{{$categoria['nombre']}}</td>
                                    <td class="align-middle"> 
                                        {{$categoria['categoria_padre']['nombre'] }}
                                    </td>
                                    <td class="align-middle text-nowrap" style="width: 150px;">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('categorias.edit', $categoria['id']) }}" title="Editar"
                                            class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                                            <form id="formDeleteCategoria_{{ $categoria['id'] }}"
                                            action="{{route('categorias.delete', $categoria['id']) }}" method="post">
                                                @csrf
                                                <button type="button" title="Eliminar"
                                                onclick="confirmDelete({{ $categoria['id'] }})" title="Eliminar" class="btn btn-sm btn-danger">
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
                        var formId = 'formDeleteCategoria_' + id;
                        var form = document.getElementById(formId);
                        form.submit(); // Envía el formulario si el usuario confirma
                    }
                });
            }
        </script>
    @endpush 
    
</x-layouts.app>
