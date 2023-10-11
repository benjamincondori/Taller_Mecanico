<x-layouts.app>

    <x-layouts.content title="Listado de Usuarios" subtitle="" name="Listado de Usuarios">

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="mb-2 d-flex justify-content-between">
                        <div class="form-group d-none d-lg-flex align-items-center">
                            <span>Mostrar</span>
                            <select wire:model="cant" class="custom-select px-3 mx-1">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span>registros</span>
                        </div>

                        <div class="form-group w-50 d-flex">
                            <input type="text" class="form-control" placeholder="Buscar...">
                            <button class="btn text-secondary" type="button" disabled>
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                <i class="fas fa-plus-circle"></i>&nbsp;
                                Registrar Usuario
                            </button>
                        </div>

                    </div>


                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">Email</th>
                                    <th scope="col">Contraseña</th>
                                    <th scope="col">Persona</th>
                                    <th scope="col">Tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if ($clientes->count()) --}}
                                @foreach ($data as $usuario)

                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">{{$usuario['email']}}</th>
                                    <td class="align-middle">{{$usuario['password']}}</td>
                                    <td class="align-middle text-nowrap">
                                        <button type="button" title="Ver" class="btn btn-sm btn-warning"><i
                                                class="fas fa-eye"></i></button>
                                        <button type="button" title="Editar" class="btn btn-sm btn-primary"><i
                                                class="fas fa-edit"></i></button>
                                        <button type="button" title="Eliminar" class="btn btn-sm btn-danger"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>

                                @endforeach
                                {{-- @else
                                <tr class="text-center">
                                    <td colspan="7">No existe ningún registro.</td>
                                </tr>
                                @endif  --}}
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end justify-content-sm-between pt-3 pb-0">
                        <div class="text-muted d-none d-sm-block pt-1">
                            Mostrando del 1 al 3 de 4 registros
                        </div>
                        {{-- @if ($clientes->hasPages()) --}}
                        <div class="pagination-links">
                        </div>
                        {{-- @endif --}}
                    </div>

                </div>
            </div>
        </div>

    </x-layouts.content>

</x-layouts.app>
