<x-layouts.app>
    <x-layouts.content title="Nueva Cotización" subtitle="" name="Nueva Cotización">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-file-invoice-dollar fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Crear nueva cotización</h3>
                    </div>
                    <form id="nuevaCotizacionForm" action="{{ route('cotizacion.store') }}" method="post">
                         <!-- Campo oculto para la fecha con valor predeterminado de la fecha actual -->
    <input type="hidden" name="fecha" value="{{ date('Y-m-d') }}">
    
    <!-- Campo oculto para el precio con valor predeterminado de 0 -->
    <input type="hidden" name="precio" value="0">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cliente" class="control-label">Cliente</label>
                                    <select class="form-control" id="cliente" name="cliente">
                                            <option value="">Selecciona un cliente</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente['id'] }}">{{ $cliente['ci'] }} | {{ $cliente['nombre'] }} {{ $cliente['apellido'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vehiculo" class="control-label">Vehículo</label>
                                    @if (!empty($vehiculos))
                                        <select class="form-control" id="vehiculo" name="vehiculo" >
                                            <option value="">Selecciona un vehículo</option>
                                            @foreach ($vehiculos as $vehiculo)
                                            <option value="{{ $vehiculo['id'] }}">{{ $vehiculo['placa'] }}, {{ $vehiculo['modelo_nombre'] }}, {{ $vehiculo['marca_nombre'] }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select class="form-control" id="vehiculo" name="vehiculo">
                                            <option value="">No hay vehículos registrados</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion" class="control-label">Descripcion</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" >
                                </div>
                            </div>
                            
                        </div>
                            <a href="{{ route('cotizacion.index') }}" class="btn btn-danger waves-effect m-l-5">
                                Cancelar
                            </a>
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Guardar Cotización
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-layouts.content>
</x-layouts.app>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const clienteSelect = document.getElementById("cliente");
        const vehiculoSelect = document.getElementById("vehiculo");
        const productoSelect = document.getElementById("producto");
        const servicioSelect = document.getElementById("servicio");
        const precioUnitarioInput = document.getElementById("precioUnitarioProducto");
        const cantidadInput = document.getElementById("cantidadProducto");
        const precioPorCantidadInput = document.getElementById("precioPorCantidadProducto");
        
        const precioUnitarioServicioInput = document.getElementById("precioUnitarioServicio");
        const cantidadServicioInput = document.getElementById("cantidadServicio");
        const precioPorCantidadServicioInput = document.getElementById("precioPorCantidadServicio");
        const precioTotalInput = document.getElementById("precioTotal");
        
        // Inicializa el campo TOTAL en 0
        precioTotalInput.value = 0;

        clienteSelect.addEventListener("change", function () {
            if (clienteSelect.value !== "") {
                vehiculoSelect.removeAttribute("disabled");
                productoSelect.removeAttribute("disabled");
                servicioSelect.removeAttribute("disabled");
            } else {
                vehiculoSelect.setAttribute("disabled", "disabled");
                productoSelect.setAttribute("disabled", "disabled");
                servicioSelect.setAttribute("disabled", "disabled");
            }
        });

        productoSelect.addEventListener("change", function () {
            const selectedOption = productoSelect.options[productoSelect.selectedIndex];
            const precio = selectedOption.getAttribute("data-precio");
            precioUnitarioInput.value = precio;
            updatePrecioPorCantidad();
        });

        cantidadInput.addEventListener("input", function () {
            updatePrecioPorCantidad();
        });

        function updatePrecioPorCantidad() {
            const cantidad = parseFloat(cantidadInput.value);
            const precioUnitario = parseFloat(precioUnitarioInput.value);
            const precioPorCantidad = cantidad * precioUnitario;
            precioPorCantidadInput.value = isNaN(precioPorCantidad) ? "" : precioPorCantidad;
            updateTotal();
        }

        servicioSelect.addEventListener("change", function () {
            const selectedOption = servicioSelect.options[servicioSelect.selectedIndex];
            const precio = selectedOption.getAttribute("data-precio");
            precioUnitarioServicioInput.value = precio;
            updatePrecioPorCantidadServicio();
        });

        precioUnitarioServicioInput.addEventListener("input", function () {
            updatePrecioPorCantidadServicio();
        });

        cantidadServicioInput.addEventListener("input", function () {
            updatePrecioPorCantidadServicio();
        });

        function updatePrecioPorCantidadServicio() {
            const cantidad = parseFloat(cantidadServicioInput.value);
            const precioUnitario = parseFloat(precioUnitarioServicioInput.value);
            const precioPorCantidad = cantidad * precioUnitario;
            precioPorCantidadServicioInput.value = isNaN(precioPorCantidad) ? "" : precioPorCantidad;
            updateTotal();
        }

        function updateTotal() {
            const precioProducto = parseFloat(precioPorCantidadInput.value) || 0;
            const precioServicio = parseFloat(precioPorCantidadServicioInput.value) || 0;
            precioTotalInput.value = precioProducto + precioServicio;
        }
    });
</script>
