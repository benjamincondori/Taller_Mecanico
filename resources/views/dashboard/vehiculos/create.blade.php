<x-layouts.app>

    <x-layouts.content title="Vehiculos" subtitle="" name="Vehiculos">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-car fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Registrar Vehiculo</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="#" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="placa" class="control-label">Placa</label>
                                    <input type="text" class="form-control" id="placa" name="placa"
                                        placeholder="XXXXXX" value="{{ old('placa') }}" >
                                    @error('placa')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nro_chasis" class="control-label">Numero de Chasis</label>
                                    <input type="text" class="form-control" id="nro_chasis" name="nro_chasis"
                                        placeholder="XXXXXXXXXXXX" value="{{ old('nro_chasis') }}">
                                    @error('nro_chasis')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="año" class="control-label">Año</label>
                                    <input type="text" class="form-control" id="año" name="año"
                                        placeholder="XXXX" value="{{ old('año') }}" >
                                    @error('año')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color" class="control-label">Color</label>
                                    <input type="text" class="form-control" id="color" name="color"
                                        placeholder="XXXXXXXXXXXX" value="{{ old('color') }}">
                                    @error('color')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="marca_id" class="control-label">Marca</label>
                                    <select class="form-control" name="marca_id" id="marca_id">
                                        <option value="">Seleccionar</option>
                                        @foreach ($marcas as $marca)
                                            <option value="{{ $marca['id'] }}">{{ $marca['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('marca_id')
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
                                            <option value="{{ $marca['id'] }}">{{ $marca['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('marca_id')
                                        <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                                            

                        <div class="form-group text-right m-b-0">
                            <a href="{{ route('vehiculos.index') }}" class="btn btn-danger waves-effect m-l-5">
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
