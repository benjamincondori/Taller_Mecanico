<x-layouts.app>

    <x-layouts.content title="Clientes" subtitle="" name="Clientes">

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
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                data-target="#con-close-modal">
                                <i class="fas fa-plus-circle"></i>&nbsp;
                                Nuevo Cliente
                            </button>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">CI</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Telefono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if ($clientes->count()) --}}
                                {{-- @foreach ($clientes as $cliente) --}}
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">7463313</th>
                                    <td class="align-middle">Pablo Alexis</td>
                                    <td class="align-middle">Lijeron Añez</td>
                                    <td class="align-middle">77665321</td>
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
                                    <th scope="row" class="align-middle">7463313</th>
                                    <td class="align-middle">Eben Ezer</td>
                                    <td class="align-middle">Cayo Terrazas</td>
                                    <td class="align-middle">77665321</td>
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
                                    <th scope="row" class="align-middle">7463313</th>
                                    <td class="align-middle">Cesar Alejandro</td>
                                    <td class="align-middle">Caballero Caballero</td>
                                    <td class="align-middle">77665321</td>
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
                                    <th scope="row" class="align-middle">7463313</th>
                                    <td class="align-middle">Diego</td>
                                    <td class="align-middle">Iglesias Godoy</td>
                                    <td class="align-middle">77665321</td>
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


                    <!-- Custom Modals -->
                    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-dark">
                                    <div class="d-lg-flex align-items-center text-light">
                                        <i class="fas fa-user-plus fa-lg d-none d-lg-flex"></i>
                                        <h4 class="modal-title text-light">&nbsp;&nbsp; Registrar un Nuevo Cliente</h4>
                                    </div>
                                    <button type="button" class="close" style="color: gainsboro" data-dismiss="modal"
                                        aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body p-4">
                                    <form method="POST" action="{{ route('clientes.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nombre" class="control-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                        placeholder="John">
                                                    @error('nombre')
                                                    <span class="error text-danger">* {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="apellido" class="control-label">Apellido</label>
                                                    <input type="text" class="form-control" id="apellido"
                                                        name="apellido" placeholder="Doe">
                                                    @error('apellido')
                                                    <span class="error text-danger">* {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="email" class="control-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="jhondoe@gmail.com">
                                                    @error('email')
                                                    <span class="error text-danger">* {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="direccion" class="control-label">Dirección</label>
                                                    <input type="text" class="form-control" id="direccion"
                                                        name="direccion" placeholder="Address">
                                                    @error('direccion')
                                                    <span class="error text-danger">* {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ci" class="control-label">Cédula de identidad</label>
                                                    <input type="number" min="0" class="form-control" id="ci" name="ci"
                                                        placeholder="1234567">
                                                    @error('ci')
                                                    <span class="error text-danger">* {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="telefono" class="control-label">Número
                                                        telefónico</label>
                                                    <input type="number" min="0" class="form-control" id="telefono"
                                                        name="telefono" placeholder="776644512">
                                                    @error('telefono')
                                                    <span class="error text-danger">* {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Género</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" value="F" name="customRadio"
                                                            class="custom-control-input" id="femenino">
                                                        <label for="femenino"
                                                            class="custom-control-label">Femenino</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mt-1">
                                                        <input type="radio" value="M" name="customRadio"
                                                            class="custom-control-input" id="masculino">
                                                        <label for="masculino"
                                                            class="custom-control-label">Masculino</label>
                                                    </div>
                                                </div>
                                                @error('genero')
                                                <span class="error text-danger">* {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger waves-effect"
                                        data-dismiss="modal">Cancelar</button>
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal -->

                </div>
            </div>
        </div>

    </x-layouts.content>

</x-layouts.app>