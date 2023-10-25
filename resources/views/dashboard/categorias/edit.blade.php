<x-layouts.app>

    <x-layouts.content title="Editar Categoria" subtitle="" name="Categorias">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-user-plus fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Editar categoria</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{ route('categorias.update', $categoria_editar['id']) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="introduzca categoria" value="{{$categoria_editar['nombre']}}" >
                                    @error('nombre')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria_id" class="control-label">Marca</label>
                                    <select class="form-control" name="categoria_id" id="categoria_id"> 
                                        @if (!$categorias)
                                        <tr class="text-nowrap text-center">
                                            <option value="-1">no existen registros</option>
                                        </tr>
                                        @else
                                            @if (!$categoria_padre)
                                                <option value="-1">Seleccionar Categoria</option>
                                            @else
                                                <option value="{{$categoria_padre['id']}}">{{$categoria_padre['nombre']}}</option>
                                            @endif
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria['id'] }}">{{ $categoria['nombre'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <a href="{{ route('categorias.index') }}" class="btn btn-danger waves-effect m-l-5">
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
