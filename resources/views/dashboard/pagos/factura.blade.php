<x-layouts.app>

    <x-layouts.content title="Factura" subtitle="" name="Factura">


        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <section class="px-4 pt-4">
                        {{-- <table class="col-md-12">
                            <tr>
                                <th> --}}
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <img src="{{ asset('assets/images/logo-taller-black.png') }}" alt=""
                                                height="100">
                                        </div>
                                        <div class="float-right">
                                            <h4 class="m-0" style="font-size: 3.5em">FACTURA</h4>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mt-3">
                                                <p><b>Bienvenido/a, {{$nombre}} </b></p>
                                                <p class="text-muted">Valoramos tu confianza en nosotros <br>
                                                    y nos comprometemos a proporcionarte <br>
                                                    un servicio personalizado a tu vehiculo.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 offset-md-2">
                                            <div class="mt-3">
                                                <p class="m-b-10"><strong>N° de Factura :&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </strong> <span class="float-md-right"> {{ $factura['id']}}</span>
                                                </p>
                                                <p class="m-b-10"><strong>Fecha :&nbsp;&nbsp;&nbsp;&nbsp; </strong>
                                                    <span class="float-md-right">
                                                        {{ $factura['fecha_emision'] }}
                                                    </span></p>
                                                <p class="m-b-10"><strong>Estado :&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </strong><span class="float-md-right">
                                                        <span class="text-white py-0 px-1 rounded-lg bg-success">
                                                            {{ 'Pagado' }}</span>
                                                    </span></p>
                                            </div>
                                        </div>
                                    </div>
                                {{-- </th>
                            </tr> --}}
                            {{-- <tr>
                                <th> --}}
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <address>
                                                <strong>TALLER MECANICO "BALJEET"</strong><br>
                                                Direccion: Av. Bush, 3er anillo, #32<br>
                                                Santa Cruz - Bolivia<br>
                                            </address>
                                        </div>

                                        {{-- <div class="col-md-4">
                                            <address>
                                                <strong>Usuario</strong><br>
                                                {{ isset($usuario->nombres) ? $usuario->nombres : '' }}
                                                {{ isset($usuario->apellidos) ? $usuario->apellidos : '' }}<br>
                                                {{ isset($usuario->email) ? $usuario->email : '' }}<br>
                                            </address>
                                        </div> --}}

                                        <div class="col-md-6">
                                            <address>
                                                <strong>Cliente</strong><br>
                                                NIT - C.I.: {{$ci}} <br>
                                                {{$nombre}}
                                            </address>
                                        </div>
                                    </div>
                                {{-- </th>
                            </tr>
                        </table> --}}
                    </section>

                    <section class="px-4 mt-3">
                        <div class="col-md-12 px-0">
                            <div class="form-group">
                                <label for="descripcion" class="control-label">
                                    <strong>Detalle:</strong>
                                </label>
                                <div id="datosProductos">
                                    @if (count($productos) > 0)
                                    <table id="tablaProductos" class="table table-bordered text-center">
                                        <thead>
                                            {{-- <thead style="background-color: #3a415a; color: white;"> --}}
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
                                                <td class="align-middle">{{ $producto['pivot']['producto_cantidad'] }}
                                                </td>
                                                <td class="align-middle">{{ 'Bs. ' . $producto['precio_venta'] }}</td>
                                                <td class="align-middle">{{ 'Bs. ' .
                                                    $producto['pivot']['producto_cantidad'] * $producto['precio_venta']
                                                    }}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td class="align-middle">SUMA TOTAL DE PRODUCTOS</td>
                                                <td>{{ 'Bs. ' .formatearNumero(sumaPrecioTotalProductos($productos))}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                                <br>
                                <div id="datosServicios">
                                    @if (count($servicios) > 0)
                                    <table id="tablaServicios" class="table table-bordered text-center">
                                        <thead>
                                            {{-- <thead style="background-color: #3a415a; color:white;"> --}}
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
                                                <td class="align-middle">{{ $servicio['pivot']['servicio_cantidad'] }}
                                                </td>
                                                <td class="align-middle">{{ 'Bs. ' . $servicio['precio'] }}</td>
                                                <td class="align-middle">{{ 'Bs. ' .
                                                    $servicio['pivot']['servicio_cantidad'] * $servicio['precio'] }}
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td class="align-middle">SUMA TOTAL DE SERVICIOS</td>
                                                <td>{{ 'Bs. ' .formatearNumero(sumaPrecioTotalServicios($servicios))}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- <br>
                    <br>
                    <br> --}}
                    <section class="px-4 mt-3">

                        <table id="tablaProductosServicios" class="table table-bordered text-center">
                            <tr>
                                <th colspan="2">RESUMEN</th>
                                {{-- <th></th> --}}
                            </tr>
                            <tr>
                                <td>SUMA TOTAL DE PRODUCTOS</td>
                                <td>{{ 'Bs. ' .formatearNumero(sumaPrecioTotalProductos($productos))}}</td>
                            </tr>
                            @if (count($servicios) > 0)
                                <tr>
                                    <td>SUMA TOTAL DE SERVICIOS</td>
                                    <td>{{ 'Bs. ' .formatearNumero(sumaPrecioTotalServicios($servicios))}}</td>
                                </tr>
                            @endif
                            <tr>
                                <td>MONTO TOTAL A PAGAR</td>
                                <td>{{ 'Bs. ' .$factura['monto_total']}}</td>
                            </tr>
                            <tr>
                                <td>EFECTIVO</td>
                                <td>{{ 'Bs. ' .$factura['importe']}}</td>
                            </tr>
                            <tr>
                                <td>SALDO</td>
                                <td>{{ 'Bs. ' .$factura['saldo']}}</td>
                            </tr>
                        </table>

                    </section>
                    {{-- <br>
                    <br> --}}

                    <footer class="px-4">
                        MUCHAS GRACIAS POR SU COMPRA...
                    </footer>

                    <div class="mt-4 mb-1">
                        <div class="text-right d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i
                                    class="mdi mdi-printer mr-1"></i> Imprimir</a>
                            <a href="{{ route('pagos.index') }}" class="btn btn-danger waves-effect m-l-5"> Cerrar</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </x-layouts.content>
</x-layouts.app>

<!-- </body>
</html> -->
