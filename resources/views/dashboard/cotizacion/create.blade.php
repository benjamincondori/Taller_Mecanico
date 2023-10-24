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
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cliente" class="control-label">Cliente</label>
                                    @if (!empty($clientes))
                                        <select class="form-control" id="cliente" name="cliente">
                                            <option value="">Selecciona un cliente</option>
                                            @foreach ($clientes as $cliente)
                                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select class="form-control" id="cliente" name="cliente">
                                            <option value="">No hay clientes registrados</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vehiculo" class="control-label">Vehículo</label>
                                    @if (!empty($vehiculos))
                                        <select class="form-control" id="vehiculo" name="vehiculo">
                                            <option value="">Selecciona un vehículo</option>
                                            @foreach ($vehiculos as $vehiculo)
                                                <option value="{{ $vehiculo->id }}">{{ $vehiculo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select class="form-control" id="vehiculo" name="vehiculo">
                                            <option value="">No hay vehiculos registrados</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Campos para productos -->
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="producto" class="control-label">Producto</label>
                                    <input type="text" class="form-control" id="producto" name="producto">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="cantidadProducto" class="control-label">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidadProducto" name="cantidadProducto" value="1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="precioUnitarioProducto" class="control-label">Precio Unitario</label>
                                    <input type="number" class="form-control" id="precioUnitarioProducto" name="precioUnitarioProducto" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="precioPorCantidadProducto" class="control-label">Precio por Cantidad</label>
                                    <input type="number" class="form-control" id="precioPorCantidadProducto" name="precioPorCantidadProducto" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Campos para servicios -->
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="servicio" class="control-label">Servicio</label>
                                    <input type="text" class="form-control" id="servicio" name="servicio">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="cantidadServicio" class="control-label">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidadServicio" name="cantidadServicio" value="1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="precioUnitarioServicio" class="control-label">Precio Unitario</label>
                                    <input type="number" class="form-control" id="precioUnitarioServicio" name="precioUnitarioServicio" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="precioPorCantidadServicio" class="control-label">Precio por Cantidad</label>
                                    <input type="number" class="form-control" id="precioPorCantidadServicio" name="precioPorCantidadServicio" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-primary" id="agregarProducto">Agregar Producto</button>
                            <button type="button" class="btn btn-primary" id="agregarServicio">Agregar Servicio</button>
                        </div>
                        <!-- Lista de productos y servicios agregados -->
                        <div id="productosServicios">
                            <!-- Los productos y servicios agregados se mostrarán aquí -->
                        </div>
                        <div class="form-group text-right m-b-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="precioTotal" class="control-label" style="text-align: left;"><h4>TOTAL:</h4></label>
                                        <input type="number" class="form-control" id="precioTotal" name="precioTotal" readonly style="text-align: left;">
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
    $(document).ready(function () {
        // Cargar clientes dinámicamente
        $('#cliente').on('input', function () {
            // Código para cargar clientes, similar al ejemplo anterior
        });

        // Cargar vehículos dinámicamente
        $('#cliente').on('change', function () {
            // Código para cargar vehículos, similar al ejemplo anterior
        });

        // Variables para llevar un registro de los productos y servicios agregados
        var productos = [];
        var servicios = [];

        // Agregar producto
        $('#agregarProducto').on('click', function () {
            var producto = $('#producto').val();
            var cantidad = $('#cantidadProducto').val();
            if (producto && cantidad) {
                productos.push({ nombre: producto, cantidad: cantidad });
                actualizarProductosServicios();
                // Limpia los campos del producto para agregar otro
                $('#producto').val('');
                $('#cantidadProducto').val(1);
            }
        });

        // Agregar servicio
        $('#agregarServicio').on('click', function () {
            var servicio = $('#servicio').val();
            var cantidad = $('#cantidadServicio').val();
            if (servicio && cantidad) {
                servicios.push({ nombre: servicio, cantidad: cantidad });
                actualizarProductosServicios();
                // Limpia los campos del servicio para agregar otro
                $('#servicio').val('');
                $('#cantidadServicio').val(1);
            }
        });

        // Función para actualizar la lista de productos y servicios en la vista
        function actualizarProductosServicios() {
            var listaHTML = '';
            productos.forEach(function (producto) {
                listaHTML += '<p>Producto: ' + producto.nombre + ', Cantidad: ' + producto.cantidad + '</p>';
            });
            servicios.forEach(function (servicio) {
                listaHTML += '<p>Servicio: ' + servicio.nombre + ', Cantidad: ' + servicio.cantidad + '</p>';
            });
            $('#productosServicios').html(listaHTML);
        }

        // Lógica para enviar los datos de productos y servicios al servidor cuando se envía el formulario
        $('#nuevaCotizacionForm').on('submit', function (event) {
            // Evita el envío normal del formulario
            event.preventDefault();

            // Obtiene otros datos del formulario (cliente, vehículo)
            var clienteId = $('#cliente').val();
            var vehiculoId = $('#vehiculo').val();

            // Ahora puedes enviar al servidor los datos de cliente (clienteId), vehículo (vehiculoId), productos y servicios
            // usando una solicitud AJAX o el método que prefieras.

            // Ejemplo de cómo podrías enviar los datos con AJAX:
            $.ajax({
                url: '/cotizaciones/store',
                type: 'POST',
                data: {
                    clienteId: clienteId,
                    vehiculoId: vehiculoId,
                    productos: productos,
                    servicios: servicios,
                    _token: '{{ csrf_token() }}' // Asegúrate de incluir el token CSRF
                },
                success: function (response) {
                    // Manejar la respuesta del servidor, por ejemplo, mostrar un mensaje de éxito o redirigir a otra página.
                }
            });
        });
    });
</script>