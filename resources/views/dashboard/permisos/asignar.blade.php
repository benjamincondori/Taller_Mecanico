<x-layouts.app>

    <x-layouts.content title="Asignar Permisos" subtitle="" name="Asignar Permisos">

        <div class="row">
            <div class="col-12">

                <div class="card-box">
                    <div class="d-flex justify-content-between">
                        <div class="col-md-4">
                            <select class="form-control" id="select-rol">
                                <option value="0">Seleccionar Rol</option>
                                @foreach ($roles as $rol)
                                <option value="{{ $rol['id'] }}">{{ $rol['nombre'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" id="rol-seleccionado" name="rol_id">

                        <div class="form-group">
                            <div class="d-flex">
                                <form action="{{ route('permisos.asignarTodos', $rol['id']) }}" method="post">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-check-circle"></i>&nbsp;
                                        Sincronizar todos
                                    </button>
                                </form>

                                <button type="button" class="btn btn-danger ml-1">
                                    <i class="fas fa-times-circle"></i>&nbsp;
                                    Revocar todos
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box">
                    <div class="table-responsive">
                        <table id="table-asignar-permiso" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th scope="col">Permiso</th>
                                    {{-- <th scope="col">Roles con el permiso</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permisos as $permiso)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" style="width: 100px" class="align-middle">{{ $permiso['id'] }}</th>
                                    <td class="align-middle">
                                        <form id="asignar-form" action="{{ route('permisos.store') }}" method="post">
                                            <div class="checkbox checkbox-primary">
                                                <input class="permiso-checkbox" id="{{ $permiso['id'] }}"
                                                    value="{{ $permiso['id'] }}" name="{{ $permiso['id'] }}" type="checkbox"
                                                    disabled>
                                                <label for="{{ $permiso['id'] }}">
                                                    {{ $permiso['nombre'] }}
                                                </label>
                                            </div>
                                        </form>
                                    </td>
                                    {{-- <td class="align-middle text-wrap" style="width: 200px;">{{
                                                $permiso->roles->count() }}</td> --}}
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
            document.addEventListener('DOMContentLoaded', function () {
                var selectRol = document.getElementById('select-rol');
                var rolSeleccionado = document.getElementById('rol-seleccionado');
                var checkboxes = document.querySelectorAll('.permiso-checkbox');

                selectRol.addEventListener('change', function () {
                    var selectedRoleId = selectRol.value;

                    checkboxes.forEach(function (checkbox) {
                        checkbox.disabled = selectedRoleId === '0';
                    });

                    rolSeleccionado.value = selectedRoleId;
                });
            });
        </script>
    @endpush

</x-layouts.app>
