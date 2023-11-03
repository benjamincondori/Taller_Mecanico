
<x-layouts.app>
    <x-layouts.content title="Añadir Productos y Servicios" subtitle="" name="Añadir Productos y Servicios">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-file-invoice-dollar fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Registrar Datos</h3>
                    </div>

                    <form id="nuevoProducto" class="px-4 pt-2 pb-2" action="{{ route('cotizacion.storeCotiProducto')}}"
                        method="post">
                        @csrf

                        <div class="row " >
                            <!-- Campos para productos -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="producto-id" class="control-label">Producto</label>
                                    @if (!empty($productos))
                                    <select class="form-control" id="producto" name="producto">
                                        <option value="">Selecciona un producto</option>
                                        @foreach ($productos as $producto)
                                        <option value="{{ $producto['id'] }}" data-precio="{{ $producto['precio_venta'] }}">{{
                                            $producto['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    @else
                                    <select class="form-control" id="producto" name="producto">
                                        <option value="">No hay productos registrados</option>
                                    </select>
                                    @endif
                                </div>
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
                            <input type="hidden" name="cotizacion_id" value="{{ $id }}">
                            <div class="col-md-2">
                                <label for="precioPorCantidadProducto" class="control-label"> .</label>
                                <button type="submit" class="btn btn-primary" id="agregarProducto"style="white-space: nowrap;">Agregar Producto</button>
                            </div>
                        </div>
                    </form>
                    <form id="nuevoServicio" action="{{ route('cotizacion.storeCotiServicio')}}" method="post">
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
                            <input type="hidden" name="cotizacion_id" value="{{ $id }}">
                            <div class="col-md-2">
                                <label for="precioPorCantidadProducto" class="control-label"> .</label>
                                <button type="submit" class="btn btn-primary" id="agregarProducto">Agregar Servicio
                                    .</button>
                            </div>
                        </div>
                    </form>
                    <!-- Lista de productos y servicios agregados -->

                    
                        <div class="form-group text-right m-b-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="precioTotal" class="control-label" style="text-align: left;">
                                            <h3 style="text-align: left;">TOTAL:</h3>
                                        </label>
                                        <input type="number" class="form-control" id="precioTotal2" name="precioTotal2"
                                            readonly style="text-align: left" value="0">
                                    </div>
                                </div>
                            </div>
                <div class="card-box">
                    <div class="table-responsive">
                        <table id="table-cotizaciones" class="table table-hover mb-0 dts">
                        <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Sub total</th>
                                    <th scope="col">Tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($cotiProductos == null)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">Sin Productos</th>
                                </tr>
                                @else
                                @foreach ($cotiProductos as $cotiProducto)
                                @if ($cotiProducto['cotizacion_id'] == $id)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">{{ $cotiProducto['producto_nombre'] }}</th>
                                    <td class="align-middle">{{ $cotiProducto['producto_cantidad'] }}</td>
                                    <td class="align-middle">{{ $cotiProducto['producto_preciototal'] }}</td>
                                    <td class="align-middle">Producto</td>
                                    <td class="align-middle text-nowrap" style="width: 200px">
                                        <div class="d-flex justify-content-center">
                                        <form id="formDeleteCotiProducto_{{ $cotiProducto['id'] }}"
                                            action="{{ route('cotizacion.deleteProducto', ['id' => $cotiProducto['id'], 'cotizacion_id' => $id]) }}" method="post">
                                            @csrf
                                            <button type="submit" title="Eliminar" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt"> ELIMINAR</i>
                                            </button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endif
                            </tbody>
                            <tbody>
                                @if ($cotiServicios == null)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">Sin Servicios</th>
                                </tr>
                                @else
                                @foreach ($cotiServicios as $cotiServicio)
                                @if ($cotiServicio['cotizacion_id'] == $id)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">{{ $cotiServicio['servicio_nombre'] }}</th>
                                    <td class="align-middle">{{ $cotiServicio['servicio_cantidad'] }}</td>
                                    <td class="align-middle">{{ $cotiServicio['servicio_preciototal'] }}</td>
                                    <td class="align-middle">Servicio</td>
                                    <td class="align-middle text-nowrap" style="width: 200px">
                                        <div class="d-flex justify-content-center">
                                            
                                            <form id="formDeleteCotizacion_{{ $cotiServicio['id'] }}"
                                            action="{{route('cotizacion.deleteServicio', ['id' => $cotiServicio['id'], 'cotizacion_id' => $id]) }}" method="post">
                                                @csrf
                                                <button type="button" title="Eliminar"
                                                onclick="confirmDelete({{ $cotiServicio['id'] }})" title="Eliminar" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash-alt ">  ELIMINAR </i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endif
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <form id="nuevaCotizacionForm" action="{{ route('cotizacion.update',$id)}}" method="post">
                        @csrf
                        <div class="col-md-6">    
                            <div class="form-group">
                                <label for="precioTotal" class="control-label" style="text-align: left;">
                                    <h3>TOTAL:</h3>
                                </label>
                                <input type="number" class="form-control" id="precioTotal" name="precioTotal"
                                            readonly style="text-align: left" value="0">
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
    @push('js')
        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#556ee6',
                    cancelButtonColor: '#f46a6a',
                    confirmButtonText: 'Sí, eliminarlo',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formId = 'formDeleteCotizacion_' + id;
                        var form = document.getElementById(formId);
                        form.submit(); // Envía el formulario si el usuario confirma
                    }
                });
            }
        </script>
    @endpush
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
        const cotiProductos = @json($cotiProductos);
        const cotiServicios = @json($cotiServicios);
        const id =@json($id);

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

        precioTotalInput.addEventListener("input", function () {
            updateTotal();
        });

        function updatePrecioPorCantidad() {
            const cantidad = parseFloat(cantidadInput.value);
            const precioUnitario = parseFloat(precioUnitarioInput.value);
            const precioPorCantidad = cantidad * precioUnitario;
            precioPorCantidadInput.value = isNaN(precioPorCantidad) ? "" : precioPorCantidad;
            
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
            //updateTotal();
        }

        function updateTotal() {
            let totalProducto = 0;
            let totalServicio = 0;

            // Suma los precios totales de $cotiProductos
            if (cotiProductos !== null) {
                cotiProductos.forEach(function (cotiProducto) {
                    if (cotiProducto['cotizacion_id'] == id) {
                        totalProducto += parseFloat(cotiProducto['producto_preciototal']) || 0;
                    }
                });
            }

            // Suma los precios totales de $cotiServicios
            if (cotiServicios !== null) {
                cotiServicios.forEach(function (cotiServicio) {
                    if (cotiServicio['cotizacion_id'] == id) {
                        totalServicio += parseFloat(cotiServicio['servicio_preciototal']) || 0;
                    }
                });
            }

            // Calcula el total sumando los totales de productos y servicios
            const total = totalProducto + totalServicio;
            precioTotalInput.value = total;
            // Actualiza el segundo campo "total"
            const precioTotal2Input = document.getElementById("precioTotal2");
            precioTotal2Input.value = total;
        }

        // Llama a updateTotal para calcular el total inicial
        updateTotal();
    });
</script>
