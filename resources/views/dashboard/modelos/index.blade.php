<x-layouts.app>

    <x-layouts.content title="Modelos" subtitle="" name="Modelos">

        <div class="row">
            <div class="col-12">

                <div class="mb-2 d-flex justify-content-between">

                    <div class="form-group">
                        <a href="{{ route('modelos.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Nuevo Modelo
                        </a>
                    </div>

                </div>

                <div class="card-box">

                    <div class="table-responsive">
                        <table id="table-modelos" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($modelos == null || empty($modelos))
                                    <tr class="text-nowrap text-center">
                                        <th scope="row" class="align-middle" colspan="4">No hay registros</th>
                                    </tr>
                                @else
                                    @foreach ($modelos as $modelo)
                                        <tr class="text-nowrap text-center">
                                            <th scope="row" class="align-middle">{{ $modelo['id'] }}</th>
                                            <td class="align-middle">{{ $modelo['nombre'] }}</td>
                                            <td class="align-middle">
                                                @foreach ($marcas as $marca)
                                                    @if ($marca['id'] == $modelo['marca_id'])
                                                        {{ $marca['nombre'] }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="align-middle text-nowrap">
                                                <a href="{{ route('modelos.edit', $modelo['id']) }}" title="Editar"
                                                    class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('modelos.delete', $modelo['id']) }}" title="Eliminar"
                                                    class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </x-layouts.content>

</x-layouts.app>
