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
                                        placeholder="lavado" value="{{ old('nombre') }}" >
                                    @error('nombre')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="precio" class="control-label">Precio</label>
                                    <input type="text" class="form-control" id="precio" name="precio"
                                        placeholder="100" value="{{ old('precio') }}">
                                    @error('precio')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion" class="control-label">Descripcion</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion"
                                        placeholder="lavar todo el vehiculo" value="{{ old('descripcion') }}">
                                    @error('descripcion')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="categoria_id" class="control-label">Categoria</label>
                                <select class="form-control" name="categoria_id" id="categoria_id"> 
                                    @if ($categorias == null)
                                    <tr class="text-nowrap text-center">
                                        <option value="">no existen registros</option>
                                    </tr>
                                    @else
                                        <option value="">Seleccionar</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria['id'] }}">{{ $categoria['nombre'] }}</option>
                                        @endforeach
                                    @endif
                                </select>
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
