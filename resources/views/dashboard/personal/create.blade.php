<x-layouts.app>

    <x-layouts.content title="Nuevo Personal" subtitle="" name="Personal">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-plus-circle fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Nuevo Personal</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{ route('personal.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ci" class="control-label">CI</label>
                                    <input type="text" class="form-control" id="ci" name="ci" placeholder="CI" value="{{ old('ci') }}" >
                                    @error('ci')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" >
                                    @error('nombre')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellido" class="control-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="{{ old('apellido') }}" >
                                    @error('apellido')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono" class="control-label">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}" >
                                    @error('telefono')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion" class="control-label">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" value="{{ old('direccion') }}" >
                                    @error('direccion')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Género</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" value="F" name="genero" class="custom-control-input" id="femenino" {{ old('genero') === 'F' ? 'checked' : '' }}>
                                        <label for="femenino" class="custom-control-label">Femenino</label>
                                    </div>
                                    <div class="custom-control custom-radio mt-1">
                                        <input type="radio" value="M" name="genero" class="custom-control-input" id="masculino" {{ old('genero') === 'M' ? 'checked' : '' }}>
                                        <label for="masculino" class="custom-control-label">Masculino</label>
                                    </div>
                                    @error('genero')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="puesto_id" class="control-label">Puesto</label>
                                    <select class="form-control" id="puesto_id" name="puesto_id">
                                        @foreach ($puestos as $puesto)
                                            <option value="{{ $puesto['id'] }}">{{ $puesto['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('puesto_id')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="usuario_id" class="control-label">Usuario ID</label>
                                    <input type="text" class="form-control" id="usuario_id" name="usuario_id" placeholder="Usuario ID" value="{{ old('usuario_id') }}" >
                                    @error('usuario_id')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <a href="{{ route('personal.index') }}" class="btn btn-danger waves-effect m-l-5">
                                Cancelar
                            </a>
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Guardar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </x-layouts.content>

</x-layouts.app>
