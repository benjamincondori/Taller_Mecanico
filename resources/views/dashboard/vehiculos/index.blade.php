<x-layouts.app>

    <x-layouts.content title="Listado de Vehiculos" subtitle="" name="Listado de Vehiculos">

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
                                Registrar Vehiculo
                            </button>
                        </div>

                    </div>


                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">Placa</th>
                                    <th scope="col">Dueño</th>
                                    <th scope="col">Chasis</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Año</th>
                                    <th scope="col">Color</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if ($clientes->count()) --}}
                                {{-- @foreach ($clientes as $cliente) --}}
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">7463313</th>
                                    <td class="align-middle">Gonzalo Gonzales Mallon</td>
                                    <td class="align-middle">45646515131153</td>
                                    <td class="align-middle">TOYOTA</td>
                                    <td class="align-middle">COROLLA</td>
                                    <td class="align-middle">2012</td>
                                    <td class="align-middle">PLOMO</td>
                                    <td class="align-middle text-nowrap">
                                        <button type="button" title="Ver" class="btn btn-sm btn-warning"><i
                                                class="fas fa-eye"></i></button>
                                        <button type="button" title="Editar" class="btn btn-sm btn-primary"><i
                                                class="fas fa-edit"></i></button>
                                        <button type="button" title="Eliminar" class="btn btn-sm btn-danger"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">6523148</th>
                                    <td class="align-middle">Ricardo Juan Gutierrez</td>
                                    <td class="align-middle">4521937st61d573</td>
                                    <td class="align-middle">NISSAN</td>
                                    <td class="align-middle">VERSA</td>
                                    <td class="align-middle">2020</td>
                                    <td class="align-middle">ROJO</td>
                                    <td class="align-middle text-nowrap">
                                        <button type="button" title="Ver" class="btn btn-sm btn-warning"><i
                                                class="fas fa-eye"></i></button>
                                        <button type="button" title="Editar" class="btn btn-sm btn-primary"><i
                                                class="fas fa-edit"></i></button>
                                        <button type="button" title="Eliminar" class="btn btn-sm btn-danger"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">8246995</th>
                                    <td class="align-middle">Roberto Gomez Bolaños</td>
                                    <td class="align-middle">36521478HE964S</td>
                                    <td class="align-middle">SUZUKI</td>
                                    <td class="align-middle">VITARA</td>
                                    <td class="align-middle">2023</td>
                                    <td class="align-middle">BLANCO</td>
                                    <td class="align-middle text-nowrap">
                                        <button type="button" title="Ver" class="btn btn-sm btn-warning"><i
                                                class="fas fa-eye"></i></button>
                                        <button type="button" title="Editar" class="btn btn-sm btn-primary"><i
                                                class="fas fa-edit"></i></button>
                                        <button type="button" title="Eliminar" class="btn btn-sm btn-danger"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">RE562C4</th>
                                    <td class="align-middle">Valentin Zalazar</td>
                                    <td class="align-middle">78FG625T476K54</td>
                                    <td class="align-middle">TOYOTA</td>
                                    <td class="align-middle">CAMRY</td>
                                    <td class="align-middle">2018</td>
                                    <td class="align-middle">AZUL</td>
                                    <td class="align-middle text-nowrap">
                                        <button type="button" title="Ver" class="btn btn-sm btn-warning"><i
                                                class="fas fa-eye"></i></button>
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
