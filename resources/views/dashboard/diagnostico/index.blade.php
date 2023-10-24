<x-layouts.app>

    <x-layouts.content title="Diagnostico" subtitle="" name="Diagnostico">

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
                                Nuevo Diagnostico
                            </button>
                        </div>

                    </div>


                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">id</th>
                                    <th scope="col">cliente</th>
                                    <th scope="col">id vehiculo</th>
                                    <th scope="col">fecha y hora</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if ($clientes->count()) --}}
                                {{-- @foreach ($clientes as $cliente) --}}
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">1</th>
                                    <td class="align-middle">Pablo Alexis Lijeron Añez</td>
                                    <td class="align-middle">1</td>
                                    <td class="align-middle">20/10/2023 - 10:00 AM</td>
                                    <td class="align-middle text-nowrap">
                                        <button type="button" title="Ver" class="btn btn-sm btn-warning"><i
                                                class="fas fa-eye"></i></button>
                                        <button type="button" title="Editar" class="btn btn-sm btn-primary"><i
                                                class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">2</th>
                                    <td class="align-middle">Eben Cayo Terraza</td>
                                    <td class="align-middle">2</td>
                                    <td class="align-middle">21/10/2023 12:00 PM</td>
                                    <td class="align-middle text-nowrap">
                                        <button type="button" title="Ver" class="btn btn-sm btn-warning"><i
                                                class="fas fa-eye"></i></button>
                                        <button type="button" title="Editar" class="btn btn-sm btn-primary"><i
                                                class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">3</th>
                                    <td class="align-middle">Pablo Alexis Lijeron Añez</td>
                                    <td class="align-middle">1</td>
                                    <td class="align-middle">21/10/2023 - 9:10 AM</td>
                                    <td class="align-middle text-nowrap">
                                        <button type="button" title="Ver" class="btn btn-sm btn-warning"><i
                                                class="fas fa-eye"></i></button>
                                        <button type="button" title="Editar" class="btn btn-sm btn-primary"><i
                                                class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">4</th>
                                    <td class="align-middle">Eben Cayo Terraza</td>
                                    <td class="align-middle">2</td>
                                    <td class="align-middle">22/10/2023 - 1:00 PM</td>
                                    <td class="align-middle text-nowrap">
                                        <button type="button" title="Ver" class="btn btn-sm btn-warning"><i
                                                class="fas fa-eye"></i></button>
                                        <button type="button" title="Editar" class="btn btn-sm btn-primary"><i
                                                class="fas fa-edit"></i></button>
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
