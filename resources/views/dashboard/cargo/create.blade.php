<x-layouts.app>

    <x-layouts.content title="Cargo" subtitle="" name="Cargo">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-user-plus fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Crear nuevo cargo</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{ route('cargo.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="John" value="{{ old('nombre') }}" >
                                    @error('nombre')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descripcion" class="control-label">descripcion</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion"
                                        placeholder="Doe" value="{{ old('descripcion') }}">
                                    @error('descripcion')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <a href="{{ route('cargo.index') }}" class="btn btn-danger waves-effect m-l-5">
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
