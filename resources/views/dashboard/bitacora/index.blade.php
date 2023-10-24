<x-layouts.app>

    <x-layouts.content title="Bitacora" subtitle="" name="Bitacora - Registro de Actividad">

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

                    </div>


                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th scope="col">ID USUARIO</th>
                                    <th scope="col">USUARIO</th>
                                    <th scope="col">DESCRIPCION</th>
                                    <th scope="col">FECHA Y HORA</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if ($clientes->count()) --}}
                                {{-- @foreach ($clientes as $cliente) --}}
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">1</th>
                                    <td class="align-middle">1</td>
                                    <td class="align-middle">Benjamin Condori</td>
                                    <td class="align-middle">Ha iniciado sesion.</td>
                                    <td class="align-middle">22/10/2023 - 19:40:14 PM</td>
                                </tr>
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">2</th>
                                    <td class="align-middle">1</td>
                                    <td class="align-middle">Benjamin Condori</td>
                                    <td class="align-middle">Registro una marca.</td>
                                    <td class="align-middle">22/10/2023 - 19:41:14 PM</td>
                                </tr>
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">3</th>
                                    <td class="align-middle">1</td>
                                    <td class="align-middle">Benjamin Condori</td>
                                    <td class="align-middle">Registro un vehiculo.</td>
                                    <td class="align-middle">22/10/2023 - 19:44:14 PM</td>
                                </tr>
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">4</th>
                                    <td class="align-middle">1</td>
                                    <td class="align-middle">Benjamin Condori</td>
                                    <td class="align-middle">Cerro sesion.</td>
                                    <td class="align-middle">22/10/2023 - 19:46:14 PM</td>
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
