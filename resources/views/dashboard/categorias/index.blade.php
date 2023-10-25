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
                                    @if (!$data)
                                        <tr class="text-nowrap text-center">
                                            <th scope = "row" class="align-middle"> no hay registros </th>
                                        </tr>
                                    @else
                                        @foreach ($data as $categoria)
                                        <tr class="text-nowrap text-center">
                                            <th scope="row" class="align-middle">{{$categoria['id']}}</th>
                                            <td class="align-middle">{{$categoria['nombre']}}</td>
                                            <td class="align-middle"> {{$categoria['categoria_id']}}</td>
                                            <td class="align-middle text-nowrap">
                                                <button type="button" title="Ver" class="btn btn-sm btn-warning"><i
                                                        class="fas fa-eye"></i></button>
                                                <a href="{{route('categorias.edit',$categoria['id'])}}" class="btn btn-sm btn-primary"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-danger" data-confirm-delete="true"><i
                                                        class="fas fa-trash-alt"></i></a>
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
