<x-layouts.app>

    <x-layouts.content title="Roles" subtitle="" name="Roles">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-pencil-alt fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Editar rol</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{ route('roles.update', $rol['id']) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="Técnico automotriz"
                                        value="{{ old('nombre', $rol['nombre']) }}" >
                                    @error('nombre')
                                        <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion" class="control-label">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion"
                                        placeholder="Se encarga del mantenimiento y reparación de vehículos" value="{{ old('descripcion', $rol['descripcion']) }}">
                                    @error('descripcion')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <a href="{{ route('roles.index') }}" class="btn btn-danger waves-effect m-l-5">
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
