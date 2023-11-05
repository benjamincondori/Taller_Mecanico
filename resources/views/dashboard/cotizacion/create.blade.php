<x-layouts.app>
    <x-layouts.content title="Nueva Cotización" subtitle="" name="Nueva Cotización">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-file-invoice-dollar fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Registrar Datos</h3>
                    </div>

                    <form id="nuevoProducto" class="px-4 pt-2 pb-2" action="{{ route('cotizacionServicio.store',$id)}}"
                        method="post">
                        @csrf

                        <div class="row">
                            <!-- Campos para productos -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="producto" class="control-label">Producto</label>
                                    @if (!empty($productos))
                                    <select class="form-control" id="producto" name="producto">
                                        <option value="">Selecciona un producto</option>
                                        @foreach ($productos as $producto)
                                        <option value="{{ $producto['id'] }}" data-precio="{{ $producto['precio'] }}">{{
                                            $producto['nombre'] }}</option>
                                            
                                        @endforeach
                                    </select>
                                    @else
                                    <select class="form-control" id="producto" name="producto">
                                        <option value="">No hay productos registrados</option>
                                    </select>
                                    @endif
                                </div>
                                <!-- Agregar Producto en la misma fila -->



                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="cantidadProducto" class="control-label">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidadProducto"
                                        name="cantidadProducto" value="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="precioUnitarioProducto" class="control-label">Precio Unitario</label>
                                    <input type="number" class="form-control" id="precioUnitarioProducto"
                                        name="precioUnitarioProducto" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="precioPorCantidadProducto" class="control-label">Precio por
                                        Cantidad</label>
                                    <input type="number" class="form-control" id="precioPorCantidadProducto"
                                        name="precioPorCantidadProducto" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="precioPorCantidadProducto" class="control-label"> .</label>
                                <button type="submit" class="btn btn-primary" id="agregarProducto">Agregar
                                    Producto</button>
                            </div>
                        </div>
                    </form>
                    <form id="nuevoServicio" action="{{ route('cotizacionServicio.store',$id)}}" method="post">
                        @csrf
                        <div class="row">
                            <!-- Campos para servicios -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="servicio" class="control-label">Servicio</label>
                                    @if (!empty($servicios))
                                    <select class="form-control" id="servicio" name="servicio">
                                        <option value="">Selecciona un servicio</option>
                                        @foreach ($servicios as $servicio)
                                        <option value="{{ $servicio['id'] }}" data-precio="{{ $servicio['precio'] }}">{{
                                            $servicio['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    @else
                                    <select class="form-control" id="servicio" name="servicio">
                                        <option value="">No hay servicios registrados</option>
                                    </select>
                                    @endif
                                </div>
                                <!-- Agregar Servicio en la misma fila -->

                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="cantidadServicio" class="control-label">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidadServicio"
                                        name="cantidadServicio" value="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for "precioUnitarioServicio" class="control-label">Precio Unitario</label>
                                    <input type="number" class="form-control" id="precioUnitarioServicio"
                                        name="precioUnitarioServicio" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="precioPorCantidadServicio" class="control-label">Precio por
                                        Cantidad</label>
                                    <input type="number" class="form-control" id="precioPorCantidadServicio"
                                        name="precioPorCantidadServicio" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="precioPorCantidadProducto" class="control-label"> .</label>
                                <button type="submit" class="btn btn-primary" id="agregarProducto">Agregar Servicio
                                    .</button>
                            </div>
                        </div>
                    </form>
                    <!-- Lista de productos y servicios agregados -->
                    <div id="productosServicios">
                        <!-- Los productos y servicios agregados se mostrarán aquí -->
                    </div>
                    <form id="nuevaCotizacionForm" action="{{ route('cotizacion.update',$id)}}" method="post">
                        @csrf
                        <div class="form-group text-right m-b-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="precioTotal" class="control-label" style="text-align: left;">
                                            <h4>TOTAL:</h4>
                                        </label>
                                        <input type="number" class="form-control" id="precioTotal" name="precioTotal"
                                            readonly style="text-align: left" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right m-b-0">
                                <a href="{{ route('cotizacion.index') }}" class="btn btn-danger waves-effect m-l-5">
                                    Cancelar
                                </a>
                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                    Registrar
                                </button>
                            </div>
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

        productoSelect.addEventListener("change", function () {
    const selectedOption = productoSelect.options[productoSelect.selectedIndex];
    const precio = selectedOption.getAttribute("data-precio");
    precioUnitarioInput.value = precio;
    updatePrecioPorCantidad();
    // Dispara manualmente el evento 'input'
    const event = new Event('input', {
        bubbles: true,
        cancelable: true,
    });
    cantidadInput.dispatchEvent(event);
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
    // Dispara manualmente el evento 'input'
    const event = new Event('input', {
        bubbles: true,
        cancelable: true,
    });
    cantidadServicioInput.dispatchEvent(event);
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
