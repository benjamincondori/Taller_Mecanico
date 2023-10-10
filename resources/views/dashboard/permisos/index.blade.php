<x-layouts.app>

    <x-layouts.content title="Roles" subtitle="" name="Roles">

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

                        <div class="btn-group mb-2 col-6">
                            <button class="btn btn-light width-xl dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Roles <i class="mdi mdi-chevron-down "></i>
                            </button>
                            <div class="dropdown-menu col-12">
                                <a class="dropdown-item" href="#">Administrador</a>
                                <a class="dropdown-item" href="#">Mecanico</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                <i class="fas fa-plus-circle"></i>&nbsp;
                                Registrar Rol
                            </button>
                        </div>

                    </div>


                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">Permiso</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if ($clientes->count()) --}}
                                {{-- @foreach ($clientes as $cliente) --}}

                                {{-- deberia hacer todos los permisos posibles directamente aca en el frontend? --}}
                                {{-- o consultamos en el backend o algo por el estilo --}}
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-center">
                                        <input class="form-check-input me-1" type="checkbox" value="" id="AccederClientesCheckbox">
                                        <label class="form-check-label" for="AccederClientesCheckbox">Acceder Clientes</label>
                                    </th>
                                </tr>

                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-center">
                                        <input class="form-check-input me-1" type="checkbox" value="" id="AccederUsuariosCheckbox">
                                        <label class="form-check-label" for="AccederUsuariosCheckbox">Acceder Usuarios</label>
                                    </th>
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
