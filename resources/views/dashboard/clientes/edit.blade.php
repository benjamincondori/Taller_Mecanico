<x-layouts.app>

    <x-layouts.content title="Clientes" subtitle="" name="Clientes">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-pencil-alt fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Editar cliente</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{ route('clientes.update', $cliente['id']) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="John" value="{{ $cliente['nombre'] }}" >
                                    @error('nombre')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellido" class="control-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido"
                                        placeholder="Doe" value="{{ $cliente['apellido'] }}" >
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
                                        placeholder="jhondoe@gmail.com" value="{{ $cliente['user']['email'] }}" >
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
                                    <input type="text" class="form-control" id="direccion" name="direccion"
                                        placeholder="Address" value="{{ $cliente['direccion'] }}">
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
                                        placeholder="1234567" value="{{ $cliente['ci'] }}">
                                    @error('ci')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono" class="control-label">Número
                                        telefónico</label>
                                    <input type="number" min="0" class="form-control" id="telefono" name="telefono"
                                        placeholder="77664412" value="{{ $cliente['telefono'] }}">
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
                                        <input type="radio" value="F" name="genero" class="custom-control-input"
                                            id="femenino" {{ $cliente['genero'] === 'F' ? 'checked' : '' }}>
                                        <label for="femenino" class="custom-control-label">Femenino</label>
                                    </div>
                                    <div class="custom-control custom-radio mt-1">
                                        <input type="radio" value="M" name="genero" class="custom-control-input"
                                            id="masculino" {{ $cliente['genero'] === 'M' ? 'checked' : '' }}>
                                        <label for="masculino" class="custom-control-label">Masculino</label>
                                    </div>
                                </div>
                                @error('genero')
                                <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <a href="{{ route('clientes.index') }}" class="btn btn-danger waves-effect m-l-5">
                                Cancelar
                            </a>
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Actualizar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </x-layouts.content>

</x-layouts.app>
