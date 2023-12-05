<x-layouts.app>
    <x-layouts.content title="Detalles de la venta" subtitle="" name="Detalles de la venta">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row mx-4 mt-3">
                        <div class="col-md-6">
                            <!-- Título de la cotización -->
                            <h4>venta: {{ $venta['id'] }}</h4>
                            <hr>
                            <p>Fecha y Hora: {{ $venta['fecha'] }}</p>
                            <hr>
                            <!-- Información del cliente -->
                            <p><b>DATOS DEL CLIENTE:</b></p>
                            <p>Nombre y apellido: {{ $venta['cliente']['nombre'] }} {{ $venta['cliente']['apellido'] }}</p>
                            <p>CI: {{ $venta['cliente']['ci'] }}</p>

                            <!-- Información del vehículo -->

                            <hr>
                        </div>
                        <div class="col-md-6 text-right">
                            <!-- Precio total de la cotización -->
                            <h4>Monto Total: {{ $venta['monto'] }}</h4>
                            <hr>
                            <p> .</p>
                            <hr>
                        </div>
                    </div>

                    <div class="row mx-4 mb-2">
                        <!-- Lista de productos -->
                        @if($venta['productos'])
                        <h5>Productos:</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre del Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Precio por Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($venta['productos'] as $producto)
                                <tr>
                                    <td>{{ $producto['nombre'] }}</td>
                                    <td>{{ $producto['pivot']['producto_cantidad'] }}</td>
                                    <td>{{ $producto['precio_venta'] }}</td>
                                    <td>{{ $producto['pivot']['producto_preciototal'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
                <a href="{{ route('ventas.index') }}" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </x-layouts.content>

</x-layouts.app>
