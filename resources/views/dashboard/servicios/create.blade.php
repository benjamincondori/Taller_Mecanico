<x-layouts.app>

    <x-layouts.content title="Servicios" subtitle="" name="Servicios">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-wrench fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Crear nuevo servicio</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{route('servicios.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="Lavado" value="{{ old('nombre') }}" >
                                    @error('nombre')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Precio</label>
                                    <div class="input-group mt-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Bs</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="150,5"
                                            name="precio" id="precio" value="{{ old('precio') }}">
                                    </div>
                                    @error('precio')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descripcion" class="control-label">Descripción</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="5"
                                        placeholder="Lavado de todo el vehículo">{{ old('descripcion') }}</textarea>
                                    @error('descripcion')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria_id" class="control-label">Categoría</label>
                                    <select class="form-control" name="categoria_id" id="categoria_id">
                                        @if ($categorias == null)
                                            <tr class="text-nowrap text-center">
                                                <option value="">no existen registros</option>
                                            </tr>
                                        @else
                                            <option value="">Seleccionar</option>
                                            @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria['id'] }}"
                                            @if ($categoria['id'] == old('categoria_id')) selected @endif>
                                                {{ $categoria['nombre'] }}
                                            </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('categoria_id')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <a href="{{ route('servicios.index') }}" class="btn btn-danger waves-effect m-l-5">
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
