<x-layouts.app>

    <x-layouts.content title="Personal" subtitle="" name="Personal">

        <div class="row">
            <div class="col-12">

                <div class="mb-2 d-flex justify-content-between">

                    <div class="form-group">
                        <a href="{{ route('personal.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Nuevo Personal
                        </a>
                    </div>

                </div>

                <div class="card-box">

                    <div class="table-responsive">
                        <table id="table-personal" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th scope="col">CI</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Género</th>
                                    <th scope="col">Puesto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $personal)
                                    <tr class="text-nowrap text-center">
                                        <th scope="row" class="align-middle">{{ $personal['id'] }}</th>
                                        <th scope="row" class="align-middle">{{ $personal['ci'] }}</th>
                                        <td class="align-middle">{{ $personal['nombre'] }}</td>
                                        <td class="align-middle">{{ $personal['apellido'] }}</td>
                                        <td class="align-middle">{{ $personal['direccion'] }}</td>
                                        <td class="align-middle">{{ $personal['telefono'] }}</td>
                                        <td class="align-middle">{{ $personal['genero'] }}</td>
                                        @if(isset($personal['puesto']))
                                            <td class="align-middle">{{ $personal['puesto']['nombre'] }}</td>
                                        @else
                                            <td class="align-middle">Sin asignar</td>
                                        @endif
                                        <td class="align-middle text-nowrap">
                                            <a href="{{ route('personal.edit', $personal['id']) }}" title="Editar" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('personal.delete', $personal['id']) }}" title="Eliminar" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
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

</x-layouts.app>
