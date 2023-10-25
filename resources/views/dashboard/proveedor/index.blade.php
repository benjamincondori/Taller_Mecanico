<x-layouts.app>

    <x-layouts.content title="Proveedor" subtitle="" name="Proveedor">

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
                                Nuevo Proveedor
                            </button>
                        </div>

                    </div>


                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if ($clientes->count()) --}}
                                {{-- @foreach ($clientes as $cliente) --}}
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">Benjamin Condori</th>
                                    <td class="align-middle">Av.cumavi</td>
                                    <td class="align-middle">12121212</td>
                                    <td class="align-middle">benjamin@gmail.com</td>
                                    <td class="align-middle text-nowrap">
                                        <button type="button" title="Editar" class="btn btn-sm btn-primary"><i
                                                class="fas fa-edit"></i></button>
                                        <button type="button" title="Eliminar" class="btn btn-sm btn-danger"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">Eben Cayo Terrazas</th>
                                    <td class="align-middle">Av. Libertador</td>
                                    <td class="align-middle">12331321</td>
                                    <td class="align-middle">eben@gmail.com</td>
                                    <td class="align-middle text-nowrap">
                                        <button type="button" title="Editar" class="btn btn-sm btn-primary"><i
                                                class="fas fa-edit"></i></button>
                                        <button type="button" title="Eliminar" class="btn btn-sm btn-danger"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">Cesar Caballero</th>
                                    <td class="align-middle">Plan 3 mil</td>
                                    <td class="align-middle">3443431</td>
                                    <td class="align-middle">cesar@gmail.com</td>
                                    <td class="align-middle text-nowrap">
                                        <button type="button" title="Editar" class="btn btn-sm btn-primary"><i
                                                class="fas fa-edit"></i></button>
                                        <button type="button" title="Eliminar" class="btn btn-sm btn-danger"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">Diego Go</th>
                                    <td class="align-middle">Los pozos</td>
                                    <td class="align-middle">434223212</td>
                                    <td class="align-middle">diego@gmail.com</td>
                                    <td class="align-middle text-nowrap">
                                        <button type="button" title="Editar" class="btn btn-sm btn-primary"><i
                                                class="fas fa-edit"></i></button>
                                        <button type="button" title="Eliminar" class="btn btn-sm btn-danger"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                {{-- @endforeach
                                @else
                                <tr class="text-center">
                                    <td colspan="7">No existe ningún registro.</td>
                                </tr>
                                @endif --}}
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end justify-content-sm-between pt-3 pb-0">
                        <div class="text-muted d-none d-sm-block pt-1">
                            Mostrando del 4 al 4 de 4 registros
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
