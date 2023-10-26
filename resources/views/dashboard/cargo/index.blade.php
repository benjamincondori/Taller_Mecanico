<x-layouts.app>

    <x-layouts.content title="Cargo" subtitle="" name="Cargo">

        <div class="row">
            <div class="col-12">

                <div class="mb-2 d-flex justify-content-between">

                    <div class="form-group">
                        <a href="{{ route('cargo.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Nuevo cargo
                        </a>
                    </div>

                </div>

                <div class="card-box">

                    <div class="table-responsive">
                        <table id="table-cargo" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th scope="col">nombre</th>
                                    <th scope="col">descripcion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $cargo)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">{{ $cargo['id'] }}</th>
                                    <th scope="row" class="align-middle">{{ $cargo['nombre'] }}</th>
                                    <td class="align-middle">{{ $cargo['descripcion'] }}</td>
                                    <td class="align-middle text-nowrap">
                                        <a href="{{ route('cargo.edit', $cargo['id']) }}" title="Editar"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('cargo.delete', $cargo['id']) }}" title="Eliminar"
                                            class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    {{-- <form action="{{route('cargo.delete',$cargo['id'])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Eliminar" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt"></i></button>
                                        </form> --}}
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
