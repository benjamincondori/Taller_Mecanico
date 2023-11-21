<x-layouts.app>

    <x-layouts.content title="Pagos" subtitle="" name="Pagos">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-plus-circle fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Agregar Pago</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{route('pagos.update', $pago['id'])}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nombre" class="control-label"><strong>Nombre del cliente:</strong></label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                           value="{{ $pago['orden_de_trabajo']['cotizacion']['cliente']['nombre'] }} {{ $pago['orden_de_trabajo']['cotizacion']['cliente']['apellido'] }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-12">
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
                                </div>
                            </div>

                            <div class="col-md-6">
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
                                            @endif>{{ ($pago['estado']) ? $pago['factura']['detalle'] : old('descripcion') }}</textarea>
                                        @error('descripcion')
                                        <span class="error text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right px-2 m-b-0">
                            <a href="{{ route('pagos.index') }}" class="btn btn-danger waves-effect m-l-5">
                                @if ($pago['estado'])
                                    Cerrar
                                @else
                                    Cancelar
                                @endif
                            </a>
                            @if (!$pago['estado'])
                                <button class="btn btn-primary waves-effect waves-light" id="guardarPago" type="submit">
                                    Guardar
                                </button>
                            @endif
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </x-layouts.content>

    @push('js')
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
    @endpush

</x-layouts.app>
