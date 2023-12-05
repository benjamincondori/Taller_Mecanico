<x-layouts.app>
    <x-layouts.content title="Nueva venta" subtitle="" name="Nueva venta">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-file-invoice-dollar fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Crear nueva venta</h3>
                    </div>
                    <form class="px-4 pt-2 pb-2" action="{{ route('ventas.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cliente_id" class="control-label">Cliente</label>
                                    <select class="form-control" id="cliente_id" name="cliente_id">
                                        <option value="">Selecciona un cliente</option>
                                        @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente['id'] }}">{{ $cliente['ci'] }} | {{
                                            $cliente['nombre'] }} {{ $cliente['apellido'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('cliente_id')
                                        <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right m-b-0">
                            <a href="{{ route('ventas.index') }}" class="btn btn-danger waves-effect m-l-5">
                                Cancelar
                            </a>
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Guardar venta
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </x-layouts.content>
</x-layouts.app>
