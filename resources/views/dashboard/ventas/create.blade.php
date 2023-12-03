<x-layouts.app>
    <x-layouts.content title="Añadir Productos" subtitle="" name="Añadir Productos">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-file-invoice-dollar fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Productos a vender</h3>
                    </div>

                    {{-- formulario para guardar productos --}}
                    <form id="nuevoProducto" class="px-4 pt-2" action="{{ route('ventas.storeProducto',$venta['id'])}}" method="post">
                        @csrf
                        <div class="row ">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="producto-id" class="control-label">Producto</label>
                                    @if (!empty($productos))
                                    <select class="form-control" id="producto" name="producto">
                                        <option value="">Selecciona un producto</option>
                                        @foreach ($productos as $producto)
                                        <option value="{{ $producto['id'] }}"
                                            data-precio="{{ $producto['precio_venta'] }}">{{
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
                                        name="cantidadProducto" value="">
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
                                <div class="d-flex flex-column">
                                    <label for="precioPorCantidadProducto" class="control-label">&nbsp;</label>
                                    <button type="submit" class="btn btn-primary" id="agregarProducto"
                                        style="white-space: nowrap;">Agregar Producto
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Lista de productos agregados -->


                    <div class="form-group px-4">
                        <div class="table-responsive py-3">
                            <table id="table-ventaproducto" class="table table-hover mb-0 dts">
                                <thead class="bg-dark text-center text-white text-nowrap">
                                    <tr style="cursor: pointer">
                                        <th scope="col">Producto</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Sub total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$venta['productos'])
                                    <tr class="text-nowrap text-center">
                                        <th scope="row" class="align-middle">Sin Productos</th>
                                    </tr>
                                    @else
                                        @foreach ($venta['productos'] as $ventaProducto)
                                            <tr class="text-nowrap text-center">
                                                <th scope="row" class="align-middle">{{ $ventaProducto['producto_nombre'] }}
                                                </th>
                                                <td class="align-middle">{{ $ventaProducto['pivot']['producto_cantidad'] }}</td>
                                                <td class="align-middle">{{ $ventaProducto['pivot']['producto_preciototal'] }}</td>
                                                <td class="align-middle">Producto</td>
                                                <td class="align-middle text-nowrap" style="width: 200px">
                                                    <div class="d-flex justify-content-center">
                                                        <form id="formDeleteventaProducto_{{ $ventaProducto['id'] }}"
                                                            action="{{ route('venta.deleteProducto', ['id' => $ventaProducto['id'], 'cotizacion_id' => $id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" title="Eliminar"
                                                                class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <form id="ActualizarVenta" action="{{ route('ventas.update',$venta['id'])}}" method="post">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group text-right">
                                    <label for="precioTotal" class="control-label" style="text-align: left;">
                                        <h3>TOTAL:</h3>
                                    </label>
                                    <input type="number" class="form-control" id="precioTotal" name="precioTotal"
                                        readonly style="text-align: left" value="0">
                                </div>
                            </div>
                            <div class="form-group text-right m-b-0">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                    Registrar
                                </button>
                            </div>
                        </form>
                        <form id="formDeleteVenta_{{ $venta['id'] }}"
                            action="{{route('ventas.delete', $venta['id']) }}" method="post">
                                @csrf
                                <div class="form-group text-right m-b-0">
                                    <button type="button" title="Eliminar"
                                     onclick="confirmDelete({{ $venta['id'] }})" title="Eliminar" class="btn btn-danger waves-effect m-l-5">
                                    Cancelar
                                    </button>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </x-layouts.content>
    @push('js')
    <script>
        function confirmDelete(id) {
                Swal.fire({
                    title: '¿Está seguro de cancelar la venta?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#556ee6',
                    cancelButtonColor: '#f46a6a',
                    confirmButtonText: 'Sí, eliminarlo',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formId = 'formDeleteVenta_' + id;
                        var form = document.getElementById(formId);
                        form.submit(); // Envía el formulario si el usuario confirma
                    }
                });
            }
    </script>
    @endpush
</x-layouts.app>
{{-- 
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
        const ventaProductos = @json($ventaProductos);
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

            // Suma los precios totales de $ventaProductos
            if (ventaProductos !== null) {
                ventaProductos.forEach(function (ventaProducto) {
                    if (ventaProducto['cotizacion_id'] == id) {
                        totalProducto += parseFloat(ventaProducto['producto_preciototal']) || 0;
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
</script> --}}
