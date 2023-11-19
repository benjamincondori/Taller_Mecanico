<x-layouts.app>

    <x-layouts.content title="Pagos" subtitle="" name="Pagos">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-plus-circle fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Agregar Pago</h3>
                    </div>

                    <hr class="mx-4" style="border-color: #F0F0F0">

                    <form class="px-4 pt-2 pb-2" action="{{ route('pagos.store') }}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="d-flex flex-md-wrap align-items-center">
                                        <label for="pago_id" class="control-label mr-2">
                                            <strong>Buscar pago:</strong>
                                        </label>
                                        <select class="form-control" data-toggle="select2" id="pago_id"
                                            name="pago_id" onchange="mostrarDatos()">
                                            <option value="">Seleccionar</option>
                                            @foreach ($pagos as $pago)
                                            <option value="{{ $pago['id'] }}"
                                            @if ($pago['id'] == old('pago_id')) selected @endif>
                                                {{ '#' . $pago['id'] }} &nbsp;&nbsp;&nbsp; {{ 'Cliente: ' .
                                                $pago['orden_de_trabajo']['cotizacion']['cliente']['nombre'] . ' ' . $pago['orden_de_trabajo']['cotizacion']['cliente']['apellido']
                                                }} &nbsp;&nbsp;&nbsp; {{ $pago['concepto'] }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('pago_id')
                                        <span class="error text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="mx-0 px-0" id="dividerDatos" style="display: none; border-color: #F0F0F0">

                        <div class="row px-4 mt-3" id="loadingIndicator" style="display: none;">
                            <div class='container'>
                                <div class='loader'>
                                    <div class='loader--dot'></div>
                                    <div class='loader--dot'></div>
                                    <div class='loader--dot'></div>
                                    <div class='loader--dot'></div>
                                    <div class='loader--dot'></div>
                                    <div class='loader--dot'></div>
                                    <div class='loader--text'></div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2" id="datos" style="display: none;">
                            <div class="col-md-6">
                                <div class="col-md-12 p-0">
                                    <div class="form-group">
                                        <label for="nombre" class="control-label"><strong>Nombre del cliente:</strong></label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                        readonly>
                                    </div>
                                </div>

                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion" class="control-label">
                                            <strong>Detalle:</strong>
                                        </label>
                                        <div id="datosProductos">
                                            @if (count($productos) > 0)
                                                <table id="tablaProductos" class="table table-bordered text-center">
                                                    <thead style="background-color: #3a415a; color: white;">
                                                        <tr>
                                                            <th class="align-middle" colspan="4">Productos</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="align-middle">Nombre del Producto</th>
                                                            <th class="align-middle">Cantidad</th>
                                                            <th class="align-middle">Precio Unitario</th>
                                                            <th class="align-middle">Precio por Cantidad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($productos as $producto)
                                                        <tr>
                                                            <td class="align-middle">{{ $producto['nombre'] }}</td>
                                                            <td class="align-middle">{{ $producto['pivot']['producto_cantidad'] }}</td>
                                                            <td class="align-middle">{{ 'Bs. ' . $producto['precio_venta'] }}</td>
                                                            <td class="align-middle">{{ 'Bs. ' . $producto['pivot']['producto_cantidad'] * $producto['precio_venta'] }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>

                                        <div id="datosServicios">
                                            @if (count($servicios) > 0)
                                                <table id="tablaServicios" class="table table-bordered text-center">
                                                    <thead style="background-color: #3a415a; color:white;">
                                                        <tr>
                                                            <th class="align-middle" colspan="4">Servicios</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="align-middle">Nombre del Servicio</th>
                                                            <th class="align-middle">Cantidad</th>
                                                            <th class="align-middle">Precio Unitario</th>
                                                            <th class="align-middle">Precio por Cantidad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($servicios as $servicio)
                                                        <tr>
                                                            <td class="align-middle">{{ $servicio['nombre'] }}</td>
                                                            <td class="align-middle">{{ $servicio['pivot']['servicio_cantidad'] }}</td>
                                                            <td class="align-middle">{{ 'Bs. ' . $servicio['precio'] }}</td>
                                                            <td class="align-middle">{{ 'Bs. ' . $servicio['pivot']['servicio_cantidad'] * $servicio['precio'] }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                </div> --}}
                            </div>

                            {{-- <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><strong>Subtotal:</strong></label>
                                        <div class="input-group mt-0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Bs</span>
                                            </div>
                                            <input type="text" class="form-control"
                                                name="subtotal" id="subtotal" value="{{ formatearNumero(calcularSubtotal($productos, $servicios))}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><strong>Descuento Aplicado:</strong></label>
                                        <div class="input-group mt-0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                            <input type="text" class="form-control"
                                            name="descuento" id="descuento" value="{{ $pago['orden_de_trabajo']['descuento'] }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><strong>Monto Total a Pagar:</strong></label>
                                        <div class="input-group mt-0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Bs</span>
                                            </div>
                                            <input type="text" class="form-control"
                                                name="monto" id="monto" value="{{ formatearNumero($pago['monto'])}}" readonly>
                                            <input type="hidden" id="montoTotal" name="montoTotal" value="{{ $pago['monto'] }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><strong>Efectivo Recibido:</strong></label>
                                        <div class="input-group mt-0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Bs</span>
                                            </div>
                                            <input class="form-control"
                                                name="efectivo" placeholder="0.00" id="efectivo"
                                                @if ($pago['estado'])
                                                type="text"
                                                    readonly value="{{ formatearNumero($pago['factura']['importe']) }}"
                                                @else
                                                    type="number" value="{{ old('efectivo') }}"
                                                @endif
                                            >
                                        </div>
                                        @error('efectivo')
                                            <span class="error text-danger">* {{ $message }}</span>
                                        @enderror
                                        <span id="mensajeError" class="error text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><strong>Saldo:</strong></label>
                                        <div class="input-group mt-0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Bs</span>
                                            </div>
                                            <input type="text" class="form-control"
                                                name="saldo" id="saldo"
                                                @if ($pago['estado'])
                                                    value="{{ formatearNumero($pago['factura']['saldo'])}}"
                                                @endif
                                                placeholder="0.00" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion" class="control-label">
                                            <strong>Descripción:</strong>
                                        </label>
                                        <textarea class="form-control" name="descripcion" id="descripcion" rows="5"
                                            @if ($pago['estado'])
                                                readonly
                                            @endif>{{ ($pago['estado']) ? $pago['factura']['detalle'] : old('descripcion') }}
                                        </textarea>
                                        @error('descripcion')
                                        <span class="error text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                        <div class="form-group text-right px-2 m-b-0">
                            <a href="{{ route('pagos.index') }}" class="btn btn-danger waves-effect m-l-5">
                                Cancelar
                            </a>
                            <button class="btn btn-primary waves-effect waves-light" id="guardarPago" type="submit">
                                Guardar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </x-layouts.content>

    @push('styles')
        <style>
            .container {
                height: 120px;
                width: 100px;
            }

            .loader {
                height: 20px;
                width: 250px;
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
            }
            .loader--dot {
                animation-name: loader;
                animation-timing-function: ease-in-out;
                animation-duration: 3s;
                animation-iteration-count: infinite;
                height: 20px;
                width: 20px;
                border-radius: 100%;
                background-color: black;
                position: absolute;
                border: 2px solid white;
            }
            .loader--dot:first-child {
                background-color: #8cc759;
                animation-delay: 0.5s;
            }
            .loader--dot:nth-child(2) {
                background-color: #8c6daf;
                animation-delay: 0.4s;
            }
            .loader--dot:nth-child(3) {
                background-color: #ef5d74;
                animation-delay: 0.3s;
            }
            .loader--dot:nth-child(4) {
                background-color: #f9a74b;
                animation-delay: 0.2s;
            }
            .loader--dot:nth-child(5) {
                background-color: #60beeb;
                animation-delay: 0.1s;
            }
            .loader--dot:nth-child(6) {
                background-color: #fbef5a;
                animation-delay: 0s;
            }
            .loader--text {
                position: absolute;
                top: 200%;
                left: 0;
                right: 0;
                width: 4rem;
                margin: auto;
            }
            .loader--text:after {
                content: "Cargando";
                font-weight: bold;
                animation-name: loading-text;
                animation-duration: 3s;
                animation-iteration-count: infinite;
            }

            @keyframes loader {
                15% {
                    transform: translateX(0);
                }
                45% {
                    transform: translateX(230px);
                }
                65% {
                    transform: translateX(230px);
                }
                95% {
                    transform: translateX(0);
                }
            }
            @keyframes loading-text {
                0% {
                    content: "Cargando";
                }
                25% {
                    content: "Cargando.";
                }
                50% {
                    content: "Cargando..";
                }
                75% {
                    content: "Cargando...";
                }
            }
        </style>
    @endpush

    @push('js')
        <script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('[data-toggle="select2"]').select2({
                    placeholder: "Seleccionar",
                    allowClear: true // Agrega un botón para borrar la selección
                });

                // Asigna el valor actual del select
                let pagoSeleccionado = $("#pago_id").val();

                // Llama a la función mostrarDatos con el valor actual
                if (pagoSeleccionado) {
                    mostrarDatos();
                }
            });
        </script>

        <script>
            $(document).ready(function () {

                function actualizarSaldo() {
                    let montoTotal = parseFloat($("#montoTotal").val());
                    let efectivoRecibido = parseFloat($("#efectivo").val());

                    // Verificar si el efectivo recibido es mayor o igual al monto total
                    if (!isNaN(montoTotal) && !isNaN(efectivoRecibido) && efectivoRecibido >= montoTotal) {
                        let saldo = efectivoRecibido - montoTotal; // Calcular el saldo
                        $("#saldo").val(saldo.toFixed(2)); // Mostrar el saldo con dos decimales
                        $("#mensajeError").text("");
                        $("#guardarPago").prop('disabled', false); // Habilitar el botón de guardar
                    } else {
                        if (!isNaN(efectivoRecibido)) {
                            $("#mensajeError").text("El efectivo recibido no puede ser menor al monto total.");
                        }
                        $("#saldo").val(''); // Limpiar el campo de saldo si no cumple la condición
                        $("#guardarPago").prop('disabled', true); // Deshabilitar el botón de guardar
                    }
                }

                // Configurar el evento de cambio en el campo de "Efectivo Recibido"
                $("#efectivo").on("change", function () {
                    actualizarSaldo(); // Llamar a la función al cambiar el valor
                });

                actualizarSaldo(); // Llamar a la función al cargar la página

            });
        </script>

        <script>
            function mostrarDatos() {
                let pagoSeleccionado = $("#pago_id").val();
                let productos;
                let servicios;

                if (pagoSeleccionado) {

                    $("#datos").hide();
                    $("#dividerDatos").hide();
                    $("#loadingIndicator").show();

                    const urlApi = "{{ env('URL_SERVER_API') }}";
                    const url = `${urlApi}/pagos/${pagoSeleccionado}`;

                    console.log(pagoSeleccionado);

                    // Realizar petición AJAX
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);

                            const nombre = data.orden_de_trabajo.cotizacion.cliente.nombre;
                            const apellido = data.orden_de_trabajo.cotizacion.cliente.apellido;

                            $("#nombre").val(nombre + ' ' + apellido);
                            // $("#telefono").val(data.cliente.telefono);

                            // $("#placa").val(data.vehiculo.placa);
                            // $("#nro_chasis").val(data.vehiculo.nro_chasis);
                            // $("#marca").val(data.vehiculo.marca_nombre);
                            // $("#modelo").val(data.vehiculo.modelo_nombre);
                            // $("#tipo_vehiculo").val(data.vehiculo.tipo_vehiculo_nombre);

                            // productos = data.productos;
                            // servicios = data.servicios;

                            // console.log(productos);
                            // console.log(servicios);

                            // Actualizar la tabla de productos, servicios y resumen
                            // actualizarTablaProductos(productos);
                            // actualizarTablaServicios(servicios);
                            // actualizarTablaResumen(productos, servicios);
                        },
                        error: function (error) {
                            console.error('Error:', error);
                        },
                        complete: function () {
                            $("#loadingIndicator").hide();
                            $("#dividerDatos").show();
                            $("#datos").show();

                            // if (productos.length > 0) {
                            //     $("#datosProductos").show();
                            // }
                            // if (servicios.length > 0) {
                            //     $("#datosServicios").show();
                            // }

                            // $("#datosResumen").show();
                        }
                    });
                } else {
                    $("#loadingIndicator").hide();
                    $("#dividerDatos").hide();
                    $("#datos").hide();
                }
            }
        </script>
    @endpush

</x-layouts.app>
