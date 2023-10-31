<x-layouts.app>

    <x-layouts.content title="Crear Categoria" subtitle="" name="Categorias">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-pencil-alt fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Editar categoria</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{ route('categorias.update', $categoria['id']) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="Introduzca la categoria" value="{{ old('nombre', $categoria['nombre']) }}" >
                                    @error('nombre')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria_id" class="control-label">Categoria Padre</label>
                                    <select class="form-control" name="categoria_id" id="categoria_id">
                                        <option value="">Seleccionar</option>
                                        <option value="1"
                                        @if (1 == old('categoria_id', $categoria['categoria_id']))
                                            selected
                                        @endif
                                        >Productos</option>
                                        <option value="2"
                                        @if (2 == old('categoria_id', $categoria['categoria_id']))
                                            selected
                                        @endif
                                        >Servicios</option>
                                        {{-- @if ($categorias == null)
                                        <tr class="text-nowrap text-center">
                                            <option value="-1">no existen registros</option>
                                        </tr>
                                        @else
                                            <option value="-1">Seleccionar</option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria['id'] }}">{{ $categoria['nombre'] }}</option>
                                            @endforeach
                                        @endif --}}
                                    </select>
                                    @error('categoria_id')
                                        <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <a href="{{ route('categorias.index') }}" class="btn btn-danger waves-effect m-l-5">
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
