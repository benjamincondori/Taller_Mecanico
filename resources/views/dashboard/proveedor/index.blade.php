<x-layouts.app>

    <x-layouts.content title="Proveedor" subtitle="" name="Proveedor">

        <div class="row">
            <div class="col-12">

                <div class="mb-2 d-flex justify-content-between">

                    <div class="form-group">
                        <a href="{{ route('proveedor.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Nuevo proveedor
                        </a>
                    </div>

                </div>

                <div class="card-box">

                    <div class="table-responsive">
                        <table id="table-proveedor" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $proveedor)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">{{ $proveedor['id'] }}</th>
                                    <td class="align-middle">{{ $proveedor['nombre'] }}</td>
                                    <td class="align-middle">{{ $proveedor['direccion'] }}</td>
                                    <td class="align-middle">{{ $proveedor['telefono'] }}</td>
                                    <td class="align-middle">{{ $proveedor['email'] }}</td>
                                    <td class="align-middle text-nowrap">
                                        <a href="{{ route('proveedor.edit', $proveedor['id']) }}" title="Editar"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('proveedor.delete', $proveedor['id']) }}" title="Eliminar"
                                            class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    {{-- <form action="{{route('proveedors.delete',$proveedor['id'])}}" method="post">
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
