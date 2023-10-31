<x-layouts.app>

    <x-layouts.content title="Modelos" subtitle="" name="Modelos">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-pencil-alt fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Editar Modelo</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{ route('modelos.update', $modelo['id']) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="Toyota" value="{{ $modelo['nombre'] }}" >
                                    @error('nombre')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="marca_id" class="control-label">Marca</label>
                                    <select class="form-control" name="marca_id" id="marca_id">
                                        <option value="">Seleccionar</option>
                                        @foreach ($marcas as $marca)
                                            <option value="{{ $marca['id'] }}"
                                            @if ($marca['id'] == old('marca_id', $modelo['marca_id']))
                                                selected
                                            @endif
                                            >{{ $marca['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('marca_id')
                                        <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <a href="{{ route('modelos.index') }}" class="btn btn-danger waves-effect m-l-5">
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
