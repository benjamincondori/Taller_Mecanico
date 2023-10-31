<x-layouts.app>

    <x-layouts.content title="Editar Usuario" subtitle="" name="Usuarios">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-pencil-alt fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Editar Usuario</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{ route('usuarios.update', $usuario['empleado']['id']) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Jhon"
                                    value="{{ old('nombre', $usuario['empleado']['nombre']) }}" >
                                    @error('nombre')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellido" class="control-label">Apellido</label>
                                    <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" placeholder="Doe"
                                    value="{{ old('apellido', $usuario['empleado']['apellido']) }}" >
                                    @error('apellido')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                        placeholder="jhondoe@gmail.com"
                                        value="{{ old('email', $usuario['email']) }}">
                                    @error('email')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion" class="control-label">Dirección</label>
                                    <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" placeholder="Dirección"
                                    value="{{ old('direccion', $usuario['empleado']['direccion']) }}" >
                                    @error('direccion')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ci" class="control-label">Cédula de Identidad</label>
                                    <input type="text" class="form-control @error('ci') is-invalid @enderror" id="ci" name="ci"
                                    placeholder="1234567" value="{{ old('ci', $usuario['empleado']['ci']) }}" >
                                    @error('ci')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono" class="control-label">Teléfono</label>
                                    <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" placeholder="77445318"
                                    value="{{ old('telefono', $usuario['empleado']['telefono']) }}" >
                                    @error('telefono')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="puesto_id" class="control-label">Puesto</label>
                                    <select class="form-control @error('puesto_id') is-invalid @enderror" id="puesto_id" name="puesto_id">
                                        <option value="">Seleccionar</option>
                                        @foreach ($puestos as $puesto)
                                            <option value="{{ $puesto['id'] }}"
                                            @if ($puesto['id'] == old('puesto_id', $usuario['empleado']['puesto_id']))
                                                selected
                                            @endif
                                            >{{ $puesto['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('puesto_id')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rol_id" class="control-label">Rol</label>
                                    <select class="form-control @error('rol_id') is-invalid @enderror" id="rol_id" name="rol_id">
                                        <option value="">Seleccionar</option>
                                        @foreach ($roles as $rol)
                                            <option value="{{ $rol['id'] }}"
                                            @if ($rol['id'] == old('rol_id', $usuario['rol_id']))
                                                selected
                                            @endif
                                            >{{ $rol['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('rol_id')
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
                                        <input type="radio" value="F" name="genero" class="custom-control-input" id="femenino"
                                        {{ old('genero', $usuario['empleado']['genero']) === 'F' ? 'checked' : '' }}>
                                        <label for="femenino" class="custom-control-label">Femenino</label>
                                    </div>
                                    <div class="custom-control custom-radio mt-1">
                                        <input type="radio" value="M" name="genero" class="custom-control-input" id="masculino"
                                        {{ old('genero', $usuario['empleado']['genero']) === 'M' ? 'checked' : '' }}>
                                        <label for="masculino" class="custom-control-label">Masculino</label>
                                    </div>
                                    @error('genero')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <a href="{{ route('usuarios.index') }}" class="btn btn-danger waves-effect m-l-5">
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
